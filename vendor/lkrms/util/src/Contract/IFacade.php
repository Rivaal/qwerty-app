<?php declare(strict_types=1);

namespace Lkrms\Contract;

/**
 * Provides a static interface to an instance of an underlying class
 *
 * @template TClass of object
 * @see \Lkrms\Concept\Facade
 * @see \Lkrms\Contract\ReceivesFacade
 */
interface IFacade
{
    /**
     * Return true if an underlying instance has been loaded
     *
     */
    public static function isLoaded(): bool;

    /**
     * Load and return an instance of the underlying class
     *
     * If called with arguments, they are passed to the constructor of the
     * underlying class.
     *
     * If the underlying class implements {@see ReceivesFacade}, the name of the
     * facade is passed to its {@see ReceivesFacade::setFacade()} method.
     *
     * @return TClass
     * @throws \RuntimeException if an underlying instance has already been
     * loaded.
     */
    public static function load();

    /**
     * Clear the underlying instance
     *
     * If an underlying instance has not been loaded, no action is taken.
     *
     */
    public static function unload(): void;

    /**
     * Return the underlying instance
     *
     * If an underlying instance has not been loaded, the implementing class may
     * either:
     * 1. throw a `RuntimeException`, or
     * 2. load an instance of the underlying class and return it
     *
     * @return TClass
     */
    public static function getInstance();
}