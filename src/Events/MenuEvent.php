<?php


namespace Braunstetter\MenuBundle\Events;


use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Symfony\Contracts\EventDispatcher\Event;
use Webmozart\Assert\Assert;

class MenuEvent extends Event
{
    /**
     * @var iterable<MenuItemInterface>
     */
    public iterable $items;

    /**
     * MenuEvent constructor.
     * @param iterable<MenuItemInterface> $items
     */
    public function __construct(iterable $items)
    {
        $this->items = $items;
    }

    public function append(callable $callable): void
    {
        $result = call_user_func($callable);
        Assert::isIterable($result, 'The callable must return an iterable');
        $this->items = $this->append_iterators($this->items, $result);
    }

    public function prepend(callable $callable): void
    {
        $result = call_user_func($callable);
        Assert::isIterable($result, 'The callable must return an iterable');
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