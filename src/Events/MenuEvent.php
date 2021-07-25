<?php


namespace Braunstetter\MenuBundle\Events;


use Symfony\Contracts\EventDispatcher\Event;

class MenuEvent extends Event
{
    public iterable $items;

    /**
     * MenuEvent constructor.
     * @param iterable $items
     */
    public function __construct(iterable $items)
    {
        $this->items = $items;
    }

    public function append(callable $callable)
    {
        $this->items = $this->append_iterators($this->items, call_user_func($callable));
    }

    public function prepend(callable $callable)
    {
        $this->items = $this->append_iterators(call_user_func($callable), $this->items);
    }

    /**
     * This appends $next iterator to $iterator.
     */
    private function append_iterators(...$iterators): iterable
    {
        foreach ($iterators as $iterator)
            foreach ($iterator as $row)
                yield ($row);
    }

}