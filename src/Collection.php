<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

final class Collection implements \Countable, \IteratorAggregate
{
    /**
     * Collection constructor.
     */
    public function __construct(
        /** @var array */
        private array $items = [],
    ) {}

    public function add($key, $value): void
    {
        $this->items[$key] = $value;
    }

    public function all(): array
    {
        return $this->items;
    }

    public function contains(mixed $value): bool
    {
        return \in_array($value, $this->items, true);
    }

    public function containsKey(mixed $value): bool
    {
        return \array_key_exists($value, $this->items);
    }

    #[\Override()]
    public function count(): int
    {
        return \count($this->items);
    }

    public function each(\Closure $callback): void
    {
        \array_map($callback, $this->items);
    }

    public function isEmpty(): bool
    {
        return $this->items === [];
    }

    public function filter(\Closure $callback): self
    {
        return new self(\array_filter($this->items, $callback));
    }

    /**
     * Determine if an item exists in the collection by key.
     */
    public function has(mixed $key): bool
    {
        return $this->offsetExists($key);
    }

    /**
     * Determine if an item exists at an offset.
     */
    public function offsetExists(mixed $key): bool
    {
        return \array_key_exists($key, $this->items);
    }

    public function first(): mixed
    {
        return \reset($this->items);
    }

    public function keys(): array
    {
        return \array_keys($this->items);
    }

    /**
     * @return mixed
     */
    public function get(mixed $key)
    {
        return $this->items[$key];
    }

    public function last(): mixed
    {
        return \end($this->items);
    }

    public function map(\Closure $callback): self
    {
        return new self(\array_map($callback, $this->items, \array_keys($this->items)));
    }

    public function pop(): mixed
    {
        return \array_pop($this->items);
    }

    public function prepend($value): void
    {
        \array_unshift($this->items, $value);
    }

    public function push($value): void
    {
        $this->items[] = $value;
    }

    public function remove($key): void
    {
        unset($this->items[$key]);
    }

    public function search(mixed $value): int|string|false
    {
        return \array_search($value, $this->items, true);
    }

    public function shift(): mixed
    {
        return \array_shift($this->items);
    }

    public function sort(\Closure $callback): void
    {
        \uasort($this->items, $callback);
    }

    public function values(): void
    {
        $this->items = \array_values($this->items);
    }

    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @return \ArrayIterator
     */
    #[\Override()]
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }
}
