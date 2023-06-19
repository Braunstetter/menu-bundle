<?php


namespace Braunstetter\MenuBundle;


use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Traversable;

abstract class Menu implements MenuInterface
{
    /**
     * @return Traversable<MenuItemInterface>
     */
    abstract public function define(): Traversable;

    /**
     * @return MenuItemInterface[]
     */
    public function __invoke(): array
    {
        return iterator_to_array($this->define(), false);
    }

}