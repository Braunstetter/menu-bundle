<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Traversable;

abstract class Menu implements MenuInterface
{
    /**
     * @return Traversable<MenuItemInterface>
     */
    abstract public function define(): Traversable;
}
