<?php declare(strict_types=1);

namespace Lkrms\Sync\Contract;

use Lkrms\Contract\IIterable;
use Lkrms\Contract\IProviderContext;

/**
 * The context within which a sync entity is instantiated
 *
 * @template-covariant TList of array|IIterable
 */
interface ISyncContext extends IProviderContext
{
    /**
     * Request an array instead of an Iterator from sync operations that return
     * a list
     *
     * {@see ISyncContext::getIteratorToArray()} returns `true` after calling
     * this method.
     *
     * @return ISyncContext<array>
     */
    public function withArrays();

    /**
     * Request an Iterator instead of an array from sync operations that return
     * a list
     *
     * {@see ISyncContext::getIteratorToArray()} returns `false` after calling
     * this method.
     *
     * @return ISyncContext<IIterable>
     */
    public function withIterators();

    /**
     * Convert non-mandatory sync operation arguments to a normalised filter and
     * add it to the context
     *
     * If, after removing the operation's mandatory arguments from `$args`, the
     * remaining values match one of the following signatures, they are mapped
     * to an associative array and returned by {@see ISyncContext::getFilter()}
     * until updated by another call to {@see ISyncContext::withArgs()}.
     *
     * 1. One array argument (`fn(...<mandatory>, array $filter)`)
     *    - Alphanumeric keys are converted to snake_case
     *    - Keys containing characters other than letters, numbers, hyphens and
     *      underscores, e.g. `'$orderby'`, are left as-is
     *
     * 2. A list of entity IDs (`fn(...<mandatory>, int|string ...$ids)`)
     *    - Converted to `[ 'id' => $ids ]`
     *
     * 3. A list of entities (`fn(...<mandatory>, ISyncEntity ...$entities)`)
     *    - Converted to an array that maps the normalised name of each entity's
     *      unqualified {@see \Lkrms\Contract\IProvidable::service()} to an
     *      array of entity IDs
     *
     * 4. No arguments (`fn(...<mandatory>`)
     *    - Converted to an empty array (`[]`)
     *
     * If `$args` doesn't match any of these, an `UnexpectedValueException` is
     * thrown.
     *
     * Using {@see ISyncContext::claimFilterValue()} to "claim" values from the
     * filter is recommended. Depending on the provider's
     * {@see \Lkrms\Sync\Support\SyncFilterPolicy}, unclaimed values may cause
     * requests to fail.
     *
     * {@see ISyncEntity} objects are replaced with the return value of
     * {@see ISyncEntity::id()} when `$args` contains an array or a list of
     * entities. This operation is not recursive.
     *
     * @param mixed ...$args Sync operation arguments, NOT including the
     * {@see ISyncContext} argument.
     * @return $this
     */
    public function withArgs(int $operation, ...$args);

    /**
     * True if list operations should return an array instead of an Iterator
     *
     * @return bool
     * @see ISyncContext::withArrays()
     * @see ISyncContext::withIterators()
     */
    public function getIteratorToArray(): bool;

    /**
     * Get the filter most recently passed via optional sync operation arguments
     *
     * @see ISyncContext::withArgs()
     */
    public function getFilter(): array;

    /**
     * Get a value from the filter most recently passed via optional sync
     * operation arguments
     *
     * Unlike other {@see ISyncContext} methods,
     * {@see ISyncContext::claimFilterValue()} modifies the object it is called
     * on instead of returning a modified clone.
     *
     * @return mixed `null` if the value has already been claimed or wasn't
     * passed to the operation.
     * @see ISyncContext::withArgs()
     */
    public function claimFilterValue(string $key);
}