<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Contracts;

use Traversable;

interface MenuInterface
{
    /**
     * @return Traversable<MenuItemInterface>
     */
    public function define(): Traversable;
}
