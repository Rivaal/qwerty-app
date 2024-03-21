<?php declare(strict_types=1);

namespace Lkrms\Support;

use Closure;
use Lkrms\Concern\TIntrospector;
use Lkrms\Container\Container;
use Lkrms\Contract\IContainer;
use Lkrms\Contract\IExtensible;
use Lkrms\Contract\IHierarchy;
use Lkrms\Contract\IProvider;
use Lkrms\Contract\IProviderContext;
use Lkrms\Contract\ISerializeRules;
use Lkrms\Facade\Convert;
use Lkrms\Support\DateFormatter;
use Lkrms\Support\Enumeration\NormaliserFlag;
use RuntimeException;
use UnexpectedValueException;

/**
 * Use reflection to generate closures that perform operations on a class
 *
 * {@see Introspector} returns values from its underlying
 * {@see IntrospectionClass} instance for any properties declared by
 * `IntrospectionClass` and not declared by `Introspector`.
 *
 * @property-read string $Class The name of the class under introspection
 *
 * @template TClass of object
 * @template TIntrospectionClass of IntrospectionClass
 */
class Introspector
{
    /**
     * @use TIntrospector<TClass,TIntrospectionClass>
     */
    use TIntrospector;

    /**
     * @internal
     */
    final public function __get(string $name)
    {
        return $this->_Class->{$name};
    }

    private function getIntrospectionClass(string $class): IntrospectionClass
    {
        return new IntrospectionClass($class);
    }

    /**
     * Normalise a property name if the class has a normaliser, otherwise return
     * it as-is
     *
     * @template T of string[]|string
     * @param T $value
     * @param $flags A bitmask of {@see NormaliserFlag} values.
     * @phpstan-param int-mask-of<NormaliserFlag::*> $flags
     * @return T
     * @see \Lkrms\Contract\IResolvable::normaliser()
     * @see \Lkrms\Contract\IResolvable::normalise()
     */
    final public function maybeNormalise($value, int $flags = NormaliserFlag::GREEDY)
    {
        return $this->_Class->maybeNormalise($value, $flags);
    }

    /**
     * Return true if the class has a normaliser
     *
     */
    final public function hasNormaliser(): bool
    {
        return !is_null($this->_Class->Normaliser);
    }

    /**
     * Get readable properties, including "magic" properties
     *
     * @return string[] Normalised property names
     */
    final public function getReadableProperties(): array
    {
        return $this->_Class->getReadableProperties();
    }

    /**
     * Get writable properties, including "magic" properties
     *
     * @return string[] Normalised property names
     */
    final public function getWritableProperties(): array
    {
        return $this->_Class->getWritableProperties();
    }

    /**
     * Return true if an action can be performed on a property
     *
     * @param $property The normalised property name to check
     */
    final public function propertyActionIsAllowed(string $property, string $action): bool
    {
        return $this->_Class->propertyActionIsAllowed($property, $action);
    }

    /**
     * Get a closure to create instances of the class from arrays with a given
     * signature
     *
     * @param bool $strict If `true`, throw an exception if any data would be
     * discarded.
     * @return Closure(array, IContainer, IHierarchy|null=, DateFormatter|null=)
     * ```php
     * function (array $array, IContainer $container, ?IHierarchy $parent = null, ?DateFormatter $dateFormatter = null)
     * ```
     */
    final public function getCreateFromSignatureClosure(array $keys, bool $strict = false): Closure
    {
        $sig = implode("\0", $keys);
        if (!($closure = $this->_Class->CreateProviderlessFromSignatureClosures[$sig][(int) $strict] ?? null)) {
            $this->_Class->CreateProviderlessFromSignatureClosures[$sig][(int) $strict] =
                $closure = $this->_getCreateFromSignatureClosure($keys, $strict);

            // If the closure was created successfully in strict mode, cache it
            // for `$strict = false` too
            if ($strict && !($this->_Class->CreateProviderlessFromSignatureClosures[$sig][(int) false] ?? null)) {
                $this->_Class->CreateProviderlessFromSignatureClosures[$sig][(int) false] = $closure;
            }
        }
        $service = $this->_Service;

        return
            static function (array $array, IContainer $container, ?IHierarchy $parent = null, ?DateFormatter $dateFormatter = null) use ($closure, $service) {
                return $closure($container,
                                $array,
                                null,
                                null,
                                $parent,
                                $dateFormatter,
                                $service);
            };
    }

    /**
     * Get a closure to create instances of the class on behalf of a provider
     * from arrays with a given signature
     *
     * @param bool $strict If `true`, throw an exception if any data would be
     * discarded.
     * @return Closure(array, IProvider, IContainer|IProviderContext|null=)
     * ```php
     * function (array $array, IProvider $provider, IContainer|IProviderContext|null $context = null)
     * ```
     */
    final public function getCreateProvidableFromSignatureClosure(array $keys, bool $strict = false): Closure
    {
        $sig     = implode("\0", $keys);
        $closure = $this->_Class->CreateProvidableFromSignatureClosures[$sig][(int) $strict] ?? null;
        if (!$closure) {
            $this->_Class->CreateProvidableFromSignatureClosures[$sig][(int) $strict] =
                $closure = $this->_getCreateFromSignatureClosure($keys, $strict);

            // If the closure was created successfully in strict mode, cache it
            // for `$strict = false` purposes too
            if ($strict && !($this->_Class->CreateProvidableFromSignatureClosures[$sig][(int) false] ?? null)) {
                $this->_Class->CreateProvidableFromSignatureClosures[$sig][(int) false] = $closure;
            }
        }
        $service = $this->_Service;

        return
            static function (array $array, IProvider $provider, $context = null) use ($closure, $service) {
                [$container, $parent] = $context instanceof IProviderContext
                    ? [$context->container(), $context->getParent()]
                    : [$context ?: $provider->container(), null];

                return $closure($container,
                                $array,
                                $provider,
                                $context ?: new ProviderContext($container, $parent),
                                $parent,
                                $provider->dateFormatter(),
                                $service);
            };
    }

    /**
     * Get a list of actions required to apply values from an array with a given
     * signature to the properties of a new or existing instance
     *
     */
    final protected function getKeyTargets(array $keys, bool $withParameters, bool $strict): IntrospectorKeyTargets
    {
        // Normalise array keys (i.e. field/property names)
        if ($this->_Class->Normaliser) {
            $keys = array_combine(
                array_map($this->_Class->CarefulNormaliser, $keys),
                $keys
            );
        } else {
            $keys = array_combine($keys, $keys);
        }

        // Check for missing constructor parameters if preparing an
        // instantiator, otherwise check for readonly properties
        if ($withParameters) {
            if ($missing = array_diff_key($this->_Class->RequiredParameters, $this->_Class->ServiceParameters, $keys)) {
                throw new UnexpectedValueException("{$this->_Class->Class} constructor requires values for: " . implode(', ', $missing));
            }
        } else {
            // Get keys that correspond to constructor parameters and isolate
            // any that don't also match a writable property or "magic" method
            $parameters = array_intersect_key($this->_Class->Parameters,
                                              $keys);
            $readonly = array_diff(array_keys($parameters),
                                   $this->_Class->getWritableProperties());
            if ($readonly) {
                throw new UnexpectedValueException("Cannot set readonly properties of {$this->_Class->Class}: " . implode(', ', $readonly));
            }
        }

        // Resolve $keys to:
        // - constructor parameters ($parameterKeys, $passByRefKeys)
        // - "magic" property methods ($methodKeys)
        // - properties ($propertyKeys)
        // - arbitrary properties ($metaKeys)
        //
        // Keys that correspond to date parameters or properties are also added
        // to $dateKeys
        $parameterKeys = $passByRefKeys = $methodKeys = $propertyKeys = $metaKeys = $dateKeys = [];

        foreach ($keys as $normalisedKey => $key) {
            if ($withParameters && ($param = $this->_Class->Parameters[$normalisedKey] ?? null)) {
                $parameterKeys[$key] = $this->_Class->ParameterIndex[$param];
                if ($this->_Class->PassByRefParameters[$normalisedKey] ?? null) {
                    $passByRefKeys[$key] = true;
                }
                if ($this->_Class->DateParameters[$normalisedKey] ?? null) {
                    $dateKeys[] = $key;
                    // If found in DateParameters, skip DateKeys check below
                    continue;
                }
            } elseif ($method = $this->_Class->Actions[IntrospectionClass::ACTION_SET][$normalisedKey] ?? null) {
                $methodKeys[$key] = $method;
            } elseif ($property = $this->_Class->Properties[$normalisedKey] ?? null) {
                if (!$this->_Class->propertyActionIsAllowed($normalisedKey, IntrospectionClass::ACTION_SET)) {
                    if ($strict) {
                        throw new UnexpectedValueException("Cannot set unwritable property '{$this->_Class->Class}::$property'");
                    }
                    continue;
                }
                $propertyKeys[$key] = $property;
            } elseif ($this->_Class->IsExtensible) {
                $metaKeys[] = $key;
            } elseif ($strict) {
                throw new UnexpectedValueException("No matching property or constructor parameter found in {$this->_Class->Class} for '$key'");
            } else {
                continue;
            }
            if (in_array($normalisedKey, $this->_Class->DateKeys)) {
                $dateKeys[] = $key;
            }
        }

        return new IntrospectorKeyTargets($parameterKeys,
                                          $passByRefKeys,
                                          $methodKeys,
                                          $propertyKeys,
                                          $metaKeys,
                                          $dateKeys);
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    private function _getCreateFromSignatureClosure(array $keys, bool $strict = false): Closure
    {
        $sig = implode("\0", $keys);
        if ($closure = $this->_Class->CreateFromSignatureClosures[$sig] ?? null) {
            return $closure;
        }

        $targets = $this->getKeyTargets($keys, true, $strict);
        [$parameterKeys, $passByRefKeys, $propertyKeys, $methodKeys, $metaKeys, $dateKeys] = [
            $targets->Parameters,
            $targets->PassByRefParameters,
            $targets->Properties,
            $targets->Methods,
            $targets->MetaProperties,
            $targets->DateProperties,
        ];

        // Build the smallest possible chain of closures
        $closure = $parameterKeys
            ? $this->_getConstructor($parameterKeys, $passByRefKeys)
            : $this->_getDefaultConstructor();
        if ($propertyKeys) {
            $closure = $this->_getPropertyClosure($propertyKeys, $closure);
        }
        // Call `setProvider()` and `setContext()` early in case property
        // methods need them
        if ($this->_Class->IsProvidable) {
            $closure = $this->_getProvidableClosure($closure);
        }
        // Ditto for `setParent()`
        if ($this->_Class->IsHierarchy) {
            $closure = $this->_getHierarchyClosure($closure);
        }
        if ($methodKeys) {
            $closure = $this->_getMethodClosure($methodKeys, $closure);
        }
        if ($metaKeys) {
            $closure = $this->_getMetaClosure($metaKeys, $closure);
        }
        if ($dateKeys) {
            $closure = $this->_getDateClosure($dateKeys, $closure);
        }

        return $this->_Class->CreateFromSignatureClosures[$sig] = $closure;
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getConstructor(array $parameterKeys, array $passByRefKeys): Closure
    {
        [$defaultArgs, $class] = [
            $this->_Class->DefaultArguments,
            $this->_Class->Class,
        ];

        return static function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service) use ($parameterKeys, $passByRefKeys, $defaultArgs, $class) {
            $args = $defaultArgs;
            foreach ($parameterKeys as $key => $index) {
                if ($passByRefKeys[$key] ?? false) {
                    $args[$index] = &$array[$key];
                    continue;
                }
                $args[$index] = $array[$key];
            }
            if ($service && strcasecmp($service, $class) && $container instanceof Container) {
                return $container->getAs($class, $service, $args);
            }

            return $container->get($class, $args);
        };
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getDefaultConstructor(): Closure
    {
        [$defaultArgs, $class] = [
            $this->_Class->DefaultArguments,
            $this->_Class->Class,
        ];

        return static function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service) use ($defaultArgs, $class) {
            if ($service && strcasecmp($service, $class) && $container instanceof Container) {
                return $container->getAs($class, $service, $defaultArgs);
            }

            return $container->get($class, $defaultArgs);
        };
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getPropertyClosure(array $propertyKeys, Closure $closure): Closure
    {
        // Use bindTo for access to protected properties
        return (static function (IContainer $container, array $array, ...$args) use ($propertyKeys, $closure) {
            $obj = $closure($container, $array, ...$args);
            foreach ($propertyKeys as $key => $property) {
                $obj->$property = $array[$key];
            }

            return $obj;
        })->bindTo(null, $this->_Class->Class);
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getProvidableClosure(Closure $closure): Closure
    {
        return static function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ...$args) use ($closure) {
            /** @var \Lkrms\Contract\IProvidable $obj */
            $obj = $closure($container, $array, $provider, $context, ...$args);
            if ($provider) {
                if (!$context) {
                    throw new UnexpectedValueException('$context cannot be null when $provider is not null');
                }

                return $obj->setProvider($provider)
                           ->setContext($context);
            }

            return $obj;
        };
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getHierarchyClosure(Closure $closure): Closure
    {
        return static function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ...$args) use ($closure) {
            /** @var IHierarchy $obj */
            $obj = $closure($container, $array, $provider, $context, $parent, ...$args);
            if ($parent) {
                return $obj->setParent($parent);
            }

            return $obj;
        };
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getMethodClosure(array $methodKeys, Closure $closure): Closure
    {
        // Use bindTo for access to protected methods
        return (static function (IContainer $container, array $array, ...$args) use ($methodKeys, $closure) {
            $obj = $closure($container, $array, ...$args);
            foreach ($methodKeys as $key => $method) {
                $obj->$method($array[$key]);
            }

            return $obj;
        })->bindTo(null, $this->_Class->Class);
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getMetaClosure(array $metaKeys, Closure $closure): Closure
    {
        return static function (IContainer $container, array $array, ...$args) use ($metaKeys, $closure) {
            $obj = $closure($container, $array, ...$args);
            foreach ($metaKeys as $key) {
                $obj->setMetaProperty((string) $key, $array[$key]);
            }

            return $obj;
        };
    }

    /**
     * @return Closure(IContainer, array, IProvider|null, IProviderContext|null,
     * IHierarchy|null, DateFormatter|null, string|null)
     * ```php
     * function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ?string $service)
     * ```
     */
    protected function _getDateClosure(array $dateKeys, Closure $closure): Closure
    {
        return static function (IContainer $container, array $array, ?IProvider $provider, ?IProviderContext $context, ?IHierarchy $parent, ?DateFormatter $dateFormatter, ...$args) use ($dateKeys, $closure) {
            if (is_null($dateFormatter)) {
                $dateFormatter = $provider
                    ? $provider->dateFormatter()
                    : $container->get(DateFormatter::class);
            }

            foreach ($dateKeys as $key) {
                if (!is_string($array[$key])) {
                    continue;
                }
                if ($date = $dateFormatter->parse($array[$key])) {
                    $array[$key] = $date;
                }
            }

            return $closure($container, $array, $provider, $context, $parent, $dateFormatter, ...$args);
        };
    }

    /**
     * Get a closure to create instances of the class from arrays
     *
     * This method is similar to
     * {@see Introspector::getCreateFromSignatureClosure()}, but it returns a
     * closure that resolves array signatures when called.
     *
     * @param bool $strict If `true`, return a closure that throws an exception
     * if any data would be discarded.
     * @return Closure(array, IContainer, IHierarchy|null=, DateFormatter|null=)
     * ```php
     * function (array $array, IContainer $container, ?IHierarchy $parent = null, ?DateFormatter $dateFormatter = null)
     * ```
     */
    final public function getCreateFromClosure(bool $strict = false): Closure
    {
        if ($closure = $this->_Class->CreateProviderlessFromClosures[(int) $strict] ?? null) {
            return $closure;
        }

        $closure =
            function (array $array, IContainer $container, ?IHierarchy $parent = null, ?DateFormatter $dateFormatter = null) use ($strict) {
                $keys = array_keys($array);

                return ($this->getCreateFromSignatureClosure($keys, $strict))($array, $container, $parent, $dateFormatter);
            };

        return $this->_Class->CreateProviderlessFromClosures[(int) $strict] = $closure;
    }

    /**
     * Get a closure to create instances of the class from arrays on behalf of a
     * provider
     *
     * This method is similar to
     * {@see Introspector::getCreateProvidableFromSignatureClosure()}, but it
     * returns a closure that resolves array signatures when called.
     *
     * @param bool $strict If `true`, return a closure that throws an exception
     * if any data would be discarded.
     * @return Closure(array, IProvider, IContainer|IProviderContext|null=)
     * ```php
     * function (array $array, IProvider $provider, IContainer|IProviderContext|null $context = null)
     * ```
     */
    final public function getCreateProvidableFromClosure(bool $strict = false): Closure
    {
        if ($closure = $this->_Class->CreateProvidableFromClosures[(int) $strict] ?? null) {
            return $closure;
        }

        $closure =
            function (array $array, IProvider $provider, $context = null) use ($strict) {
                $keys = array_keys($array);

                return ($this->getCreateProvidableFromSignatureClosure($keys, $strict))($array, $provider, $context);
            };

        return $this->_Class->CreateProvidableFromClosures[(int) $strict] = $closure;
    }

    /**
     * Get a static closure to perform an action on a property of the class
     *
     * If `$name` and `$action` correspond to a "magic" property method (e.g.
     * `_get<Property>()`), a closure to invoke the method is returned.
     * Otherwise, if `$name` corresponds to an accessible declared property, or
     * the class implements {@see IExtensible}), a closure to perform the
     * requested `$action` on the property directly is returned.
     *
     * Fails with an exception if {@see IExtensible} is not implemented and no
     * declared or "magic" property matches `$name` and `$action`.
     *
     * Closure signature:
     *
     * ```php
     * static function ($instance, ...$params)
     * ```
     *
     * @param string $name
     * @param string $action Either {@see IntrospectionClass::ACTION_SET},
     * {@see IntrospectionClass::ACTION_GET},
     * {@see IntrospectionClass::ACTION_ISSET} or
     * {@see IntrospectionClass::ACTION_UNSET}.
     * @return Closure
     */
    final public function getPropertyActionClosure(string $name, string $action): Closure
    {
        $_name = $this->_Class->maybeNormalise($name, NormaliserFlag::CAREFUL);

        if ($closure = $this->_Class->PropertyActionClosures[$_name][$action] ?? null) {
            return $closure;
        }

        if (!in_array($action, [
            IntrospectionClass::ACTION_SET,
            IntrospectionClass::ACTION_GET,
            IntrospectionClass::ACTION_ISSET,
            IntrospectionClass::ACTION_UNSET
        ])) {
            throw new UnexpectedValueException("Invalid action: $action");
        }

        if ($method = $this->_Class->Actions[$action][$_name] ?? null) {
            $closure = static function ($instance, ...$params) use ($method) {
                return $instance->$method(...$params);
            };
        } elseif ($property = $this->_Class->Properties[$_name] ?? null) {
            if ($this->_Class->propertyActionIsAllowed($_name, $action)) {
                switch ($action) {
                    case IntrospectionClass::ACTION_SET:
                        $closure = static function ($instance, $value) use ($property) { $instance->$property = $value; };
                        break;

                    case IntrospectionClass::ACTION_GET:
                        $closure = static function ($instance) use ($property) { return $instance->$property; };
                        break;

                    case IntrospectionClass::ACTION_ISSET:
                        $closure = static function ($instance) use ($property) { return isset($instance->$property); };
                        break;

                    case IntrospectionClass::ACTION_UNSET:
                        // Removal of a declared property is unlikely to be the
                        // intended outcome, so assign null instead of unsetting
                        $closure = static function ($instance) use ($property) { $instance->$property = null; };
                        break;
                }
            }
        } elseif ($this->_Class->IsExtensible) {
            $method  = $action == IntrospectionClass::ACTION_ISSET ? 'isMetaPropertySet' : $action . 'MetaProperty';
            $closure = static function ($instance, ...$params) use ($method, $name) {
                return $instance->$method($name, ...$params);
            };
        }

        if (!$closure) {
            throw new RuntimeException("Unable to perform '$action' on property '$name'");
        }

        $closure = $closure->bindTo(null, $this->_Class->Class);

        return $this->_Class->PropertyActionClosures[$_name][$action] = $closure;
    }

    final public function getGetNameClosure(): Closure
    {
        if ($this->_Class->GetNameClosure) {
            return $this->_Class->GetNameClosure;
        }

        $names = $this->_Class->maybeNormalise([
            'display_name',
            'displayname',
            'name',
            'full_name',
            'fullname',
            'surname',
            'last_name',
            'first_name',
            'title',
            'description',
            'id',
        ], NormaliserFlag::CAREFUL);

        $names = array_intersect($names, $this->_Class->getReadableProperties());

        // If surname|last_name and first_name exist, use them together,
        // otherwise don't use either of them
        if (in_array($last = reset($names), ['surname', 'last_name'])) {
            array_shift($names);
            if (($first = reset($names)) == 'first_name') {
                $last  = $this->getPropertyActionClosure($last, IntrospectionClass::ACTION_GET);
                $first = $this->getPropertyActionClosure($first, IntrospectionClass::ACTION_GET);

                return $this->_Class->GetNameClosure =
                    static function ($instance) use ($first, $last): ?string {
                        return Convert::sparseToString(' ', [$first($instance), $last($instance)]) ?: null;
                    };
            }
        }
        while (in_array(reset($names), ['last_name', 'first_name'])) {
            array_shift($names);
        }

        if (!$names) {
            return $this->_Class->GetNameClosure = static function (): ?string { return null; };
        }

        return $this->_Class->GetNameClosure = $this->getPropertyActionClosure(
            array_shift($names),
            IntrospectionClass::ACTION_GET
        );
    }

    final public function getSerializeClosure(?ISerializeRules $rules = null): Closure
    {
        $rules = $rules
            ? [$rules->getSortByKey(), $this->_Class->IsExtensible && $rules->getIncludeMeta()]
            : [false, $this->_Class->IsExtensible];
        $key = implode("\0", $rules);

        if ($closure = $this->_Class->SerializeClosures[$key] ?? null) {
            return $closure;
        }

        [$sort, $includeMeta] = $rules;
        $methods              = $this->_Class->Actions[IntrospectionClass::ACTION_GET] ?? [];
        $props                = array_intersect($this->_Class->Properties,
                                                $this->_Class->ReadableProperties ?: $this->_Class->PublicProperties);
        $keys = array_keys($props + $methods);
        if ($sort) {
            sort($keys);
        }

        $closure = (static function ($instance) use ($keys, $methods, $props) {
            $arr = [];
            foreach ($keys as $key) {
                if ($method = $methods[$key] ?? null) {
                    $arr[$key] = $instance->{$method}();
                } else {
                    $arr[$key] = $instance->{$props[$key]};
                }
            }

            return $arr;
        })->bindTo(null, $this->_Class->Class);

        if ($includeMeta) {
            $closure = static function (IExtensible $instance) use ($closure) {
                $meta = $instance->getMetaProperties();

                return ($meta ? ['@meta' => $meta] : []) + $closure($instance);
            };
        }

        return $this->_Class->SerializeClosures[$key] = $closure;
    }
}