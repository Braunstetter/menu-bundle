<?php


namespace Braunstetter\MenuBundle\Contracts;


interface MenuResolverInterface
{
    /**
     * @param array<mixed> $context
     * @return MenuItemInterface[]
     */
    public function get(string $name, array $context): array;
}