<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Contracts;

interface MenuResolverInterface
{
    /**
     * @param array<array-key, mixed> $context
     * @return MenuItemInterface[]
     */
    public function get(string $name, array $context): array;
}
