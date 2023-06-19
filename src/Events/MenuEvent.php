<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Events;

use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Closure;
use Symfony\Contracts\EventDispatcher\Event;

class MenuEvent extends Event
{
    /**
     * @var iterable<MenuItemInterface>
     */
    public iterable $items;

    public function __construct(Closure $items)
    {
        /** @var iterable<MenuItemInterface> $result */
        $result = call_user_func($items);
        $this->items = $result;
    }

    public function append(callable $callable): void
    {
        /** @var iterable<MenuItemInterface> $result */
        $result = call_user_func($callable);
        $this->items = $this->append_iterators($this->items, $result);
    }

    public function prepend(callable $callable): void
    {
        /** @var iterable<MenuItemInterface> $result */
        $result = call_user_func($callable);
        $this->items = $this->append_iterators($result, $this->items);
    }

    /**
     * @param iterable<MenuItemInterface> ...$iterators
     * @return iterable<MenuItemInterface>
     */
    private function append_iterators(iterable ...$iterators): iterable
    {
        foreach ($iterators as $iterator) {
            foreach ($iterator as $row) {
                yield $row;
            }
        }
    }
}
