<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Contracts;

interface MenuInterface
{
    /**
     * @return MenuItemInterface[]
     */
    public function __invoke(): array;
}
