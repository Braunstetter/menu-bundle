<?php


namespace Braunstetter\MenuBundle\Contracts;


interface MenuInterface
{
    /**
     * @return MenuItemInterface[]
     */
    public function __invoke(): array;
}