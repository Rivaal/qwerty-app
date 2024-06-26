<?php declare(strict_types=1);

namespace Lkrms\Support;

use DateTimeInterface;
use Lkrms\Contract\HasDateProperties;
use Lkrms\Contract\IExtensible;
use Lkrms\Contract\IHierarchy;
use Lkrms\Contract\IProvidable;
use Lkrms\Contract\IReadable;
use Lkrms\Contract\IResolvable;
use Lkrms\Contract\IWritable;
use Lkrms\Facade\Reflect;
use Lkrms\Support\Enumeration\NormaliserFlag;
use ReflectionClass;
use ReflectionMethod;
use ReflectionNamedType;
use ReflectionProperty;

/**
 * Internal use only
 *
 * @template TClass of object
 */
class IntrospectionClass
{
    public const ACTION_GET   = 'get';
    public const ACTION_ISSET = 'isset';
    public const ACTION_SET   = 'set';
    public const ACTION_UNSET = 'unset';

    /**
     * The name of the class under introspection
     *
     * @var string
     */
    public $Class;

    /**
     * True if the class implements IReadable
     *
     * @var bool
     */
    public $IsReadable;

    /**
     * True if the class implements IWritable
     *
     * @var bool
     */
    public $IsWritable;

    /**
     * True if the class implements IExtensible
     *
     * @var bool
     */
    public $IsExtensible;

    /**
     * True if the class implements IProvidable
     *
     * @var bool
     */
    public $IsProvidable;

    /**
     * True if the class implements IHierarchy
     *
     * @var bool
     */
    public $IsHierarchy;

    /**
     * True if the class implements HasDateProperties
     *
     * @var bool
     */
    public $HasDates;

    /**
     * Properties (normalised name => declared name)
     *
     * - `public` properties
     * - `protected` properties if the class implements {@see IReadable} or
     *   {@see IWritable}
     *
     * @var array<string,string>
     */
    public $Properties = [];

    /**
     * Public properties (normalised name => declared name)
     *
     * @var array<string,string>
     */
    public $PublicProperties = [];

    /**
     * Readable properties (normalised name => declared name)
     *
     * Empty if the class does not implement {@see IReadable}, otherwise:
     * - `public` properties
     * - `protected` properties returned by {@see IReadable::getReadable()}
     *
     * Does not include "magic" properties.
     *
     * @var array<string,string>
     */
    public $ReadableProperties = [];

    /**
     * Writable properties (normalised name => declared name)
     *
     * Empty if the class does not implement {@see IWritable}, otherwise:
     * - `public` properties
     * - `protected` properties returned by {@see IWritable::getWritable()}
     *
     * Does not include "magic" properties.
     *
     * @var array<string,string>
     */
    public $WritableProperties = [];

    /**
     * Action => normalised property name => "magic" property method
     *
     * @var array<string,array<string,string>>
     */
    public $Actions = [];

    /**
     * Constructor parameters (normalised name => declared name)
     *
     * @var array<string,string>
     */
    public $Parameters = [];

    /**
     * Parameters that aren't nullable and don't have a default value
     * (normalised name => declared name)
     *
     * @var array<string,string>
     */
    public $RequiredParameters = [];

    /**
     * Required parameters with a declared type that can be resolved by a
     * service container (normalised name => class/interface name)
     *
     * @var array<string,string>
     */
    public $ServiceParameters = [];

    /**
     * Parameters to pass by reference (normalised name => declared name)
     *
     * @var array<string,string>
     */
    public $PassByRefParameters = [];

    /**
     * Parameters with a declared type that implements DateTimeInterface
     * (normalised name => declared name)
     *
     * Empty if the class does not implement {@see HasDateProperties}.
     *
     * @var array<string,string>
     */
    public $DateParameters = [];

    /**
     * Default values for (all) constructor parameters
     *
     * @var mixed[]
     */
    public $DefaultArguments = [];

    /**
     * Constructor parameter name => index
     *
     * @var array<string,int>
     */
    public $ParameterIndex = [];

    /**
     * Normalised properties (declared and "magic" property names)
     *
     * @var string[]
     */
    public $NormalisedKeys = [];

    /**
     * Normalised date properties (declared and "magic" property names)
     *
     * @var string[]
     */
    public $DateKeys = [];

    /**
     * Converts properties to normalised property names
     *
     * @var (callable(string, bool=, string...): string)|null
     * ```php
     * function (string $name, bool $greedy = true, string ...$hints): string
     * ```
     */
    public $Normaliser;

    /**
     * Normalises property names with $greedy = false
     *
     * @var (callable(string): string)|null
     */
    public $GentleNormaliser;

    /**
     * Normalises property names with $hints = $this->NormalisedProperties
     *
     * @var (callable(string): string)|null
     */
    public $CarefulNormaliser;

    /**
     * Signature => closure
     *
     * @var array<string,\Closure>
     */
    public $CreateFromSignatureClosures = [];

    /**
     * Signature => (int) $strict => closure
     *
     * @var array<string,array<int,\Closure>>
     */
    public $CreateProviderlessFromSignatureClosures = [];

    /**
     * Signature => (int) $strict => closure
     *
     * @var array<string,array<int,\Closure>>
     */
    public $CreateProvidableFromSignatureClosures = [];

    /**
     * (int) $strict => closure
     *
     * @var array<int,\Closure>
     */
    public $CreateProviderlessFromClosures = [];

    /**
     * (int) $strict => closure
     *
     * @var array<int,\Closure>
     */
    public $CreateProvidableFromClosures = [];

    /**
     * Normalised property name => action => closure
     *
     * @var array<string,array<string,\Closure>>
     */
    public $PropertyActionClosures = [];

    /**
     * @var \Closure|null
     */
    public $GetNameClosure;

    /**
     * Rules signature => closure
     *
     * @var array<string,\Closure>
     */
    public $SerializeClosures = [];

    /**
     * @var ReflectionClass
     */
    protected $Reflector;

    /**
     * @param class-string<TClass> $class
     */
    public function __construct(string $class)
    {
        $this->Reflector    = $class = new ReflectionClass($class);
        $this->Class        = $class->getName();
        $this->IsReadable   = $class->implementsInterface(IReadable::class);
        $this->IsWritable   = $class->implementsInterface(IWritable::class);
        $this->IsExtensible = $class->implementsInterface(IExtensible::class);
        $this->IsProvidable = $class->implementsInterface(IProvidable::class);
        $this->IsHierarchy  = $class->implementsInterface(IHierarchy::class);
        $this->HasDates     = $class->implementsInterface(HasDateProperties::class);

        // IResolvable provides access to properties via non-canonical names
        if ($class->implementsInterface(IResolvable::class)) {
            $this->Normaliser        = $class->getMethod('normaliser')->invoke(null);
            $this->GentleNormaliser  = fn(string $name): string => ($this->Normaliser)($name, false);
            $this->CarefulNormaliser = fn(string $name): string => ($this->Normaliser)($name, true, ...$this->NormalisedKeys);
        }

        $propertyFilter = ReflectionProperty::IS_PUBLIC;
        $methodFilter   = 0;

        // IReadable and IWritable provide access to protected and "magic"
        // property methods
        if ($this->IsReadable || $this->IsWritable) {
            $propertyFilter |= ReflectionProperty::IS_PROTECTED;
            $methodFilter   |= ReflectionMethod::IS_PUBLIC | ReflectionMethod::IS_PROTECTED;
        }

        // Get instance properties
        $properties = array_filter(
            $class->getProperties($propertyFilter),
            fn(ReflectionProperty $prop) => !$prop->isStatic()
        );
        $names = Reflect::getNames($properties);
        $this->Properties = array_combine(
            $this->maybeNormalise($names, NormaliserFlag::LAZY),
            $names
        );
        $this->PublicProperties =
            $propertyFilter & ReflectionProperty::IS_PROTECTED
                ? array_intersect($this->Properties,
                                  Reflect::getNames(array_filter(
                                      $properties,
                                      fn(ReflectionProperty $prop) => $prop->isPublic()
                                  )))
                : $this->Properties;

        if ($this->IsReadable) {
            $readable = $class->getMethod('getReadable')->invoke(null);
            $readable = array_merge(
                ['*'] === $readable
                    ? $this->Properties
                    : $readable,
                $this->PublicProperties
            );
            $this->ReadableProperties = array_intersect($this->Properties, $readable);
        }

        if ($this->IsWritable) {
            $writable = $class->getMethod('getWritable')->invoke(null);
            $writable = array_merge(
                ['*'] === $writable
                    ? $this->Properties
                    : $writable,
                $this->PublicProperties
            );
            $this->WritableProperties = array_intersect($this->Properties, $writable);
        }

        // Get "magic" property methods, e.g. _get<Property>()
        if ($methodFilter) {
            /** @var ReflectionMethod[] $methods */
            $methods = array_filter(
                $class->getMethods($methodFilter),
                fn(ReflectionMethod $method) => !$method->isStatic()
            );
            $regex = implode('|', [
                ...($this->IsReadable ? [self::ACTION_GET, self::ACTION_ISSET] : []),
                ...($this->IsWritable ? [self::ACTION_SET, self::ACTION_UNSET] : []),
            ]);
            $regex = "/^_(?P<action>{$regex})(?P<property>.+)\$/i";
            foreach ($methods as $method) {
                if (!preg_match($regex, $name = $method->getName(), $match)) {
                    continue;
                }
                $action                            = strtolower($match['action']);
                $property                          = $this->maybeNormalise($match['property'], NormaliserFlag::LAZY);
                $this->Actions[$action][$property] = $name;
            }
        }

        /** @todo Create a proxy for `protected function __construct()` if the
         * class implements a designated interface, e.g. `IInstantiable` */

        // Get constructor parameters
        if (($constructor = $class->getConstructor()) && $constructor->isPublic()) {
            foreach ($constructor->getParameters() as $param) {
                $type = $param->getType();
                $type = $type instanceof ReflectionNamedType && !$type->isBuiltin()
                    ? $type->getName()
                    : null;
                $normalised   = $this->maybeNormalise($name = $param->getName(), NormaliserFlag::LAZY);
                $defaultValue = null;
                if ($param->isOptional()) {
                    $defaultValue = $param->getDefaultValue();
                } elseif (!$param->allowsNull()) {
                    $this->RequiredParameters[$normalised] = $name;
                    if ($type) {
                        $this->ServiceParameters[$normalised] = $type;
                    }
                }
                if ($param->isPassedByReference()) {
                    $this->PassByRefParameters[$normalised] = $name;
                }
                if ($this->HasDates && is_a($type, DateTimeInterface::class, true)) {
                    $this->DateParameters[$normalised] = $name;
                }
                $this->Parameters[$normalised] = $name;
                $this->DefaultArguments[]      = $defaultValue;
            }
            $this->ParameterIndex = array_flip(array_values($this->Parameters));
        }

        // Create a combined list of normalised property and method names
        $this->NormalisedKeys = array_keys(
            $this->Properties
                + ($this->Actions[self::ACTION_GET] ?? [])
                + ($this->Actions[self::ACTION_ISSET] ?? [])
                + ($this->Actions[self::ACTION_SET] ?? [])
                + ($this->Actions[self::ACTION_UNSET] ?? [])
        );

        if ($this->HasDates) {
            /** @var string[] */
            $dates = $class->getMethod('getDateProperties')->invoke(null);
            $this->DateKeys =
                ['*'] === $dates
                    ? $this->NormalisedKeys
                    : array_intersect($this->NormalisedKeys,
                                      $this->maybeNormalise($dates, NormaliserFlag::LAZY));
        }
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
        if (!$this->Normaliser) {
            return $value;
        }
        switch (true) {
            case $flags & NormaliserFlag::LAZY:
                $normaliser = $this->GentleNormaliser;
                break;
            case $flags & NormaliserFlag::CAREFUL:
                $normaliser = $this->CarefulNormaliser;
                break;
            default:
                $normaliser = $this->Normaliser;
        }
        if (is_array($value)) {
            return array_map($normaliser, $value);
        }

        return ($normaliser)($value);
    }

    /**
     * Get readable properties, including "magic" properties
     *
     * @return string[] Normalised property names
     */
    final public function getReadableProperties(): array
    {
        return array_keys(($this->ReadableProperties
                ?: $this->PublicProperties)
            + ($this->Actions[self::ACTION_GET] ?? []));
    }

    /**
     * Get writable properties, including "magic" properties
     *
     * @return string[] Normalised property names
     */
    final public function getWritableProperties(): array
    {
        return array_keys(($this->WritableProperties
                ?: $this->PublicProperties)
            + ($this->Actions[self::ACTION_SET] ?? []));
    }

    /**
     * Return true if an action can be performed on a property
     *
     * @param $property The normalised property name to check
     */
    final public function propertyActionIsAllowed(string $property, string $action): bool
    {
        switch ($action) {
            case self::ACTION_GET:
            case self::ACTION_ISSET:
                return in_array($property,
                                $this->getReadableProperties());

            case self::ACTION_SET:
            case self::ACTION_UNSET:
                return in_array($property,
                                $this->getWritableProperties());
        }

        return false;
    }
}
