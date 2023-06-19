<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Items;

use Braunstetter\MenuBundle\Contracts\MenuItemInterface;

class Item implements MenuItemInterface
{
    use MenuItemTrait;

    public const TYPE_ROUTE = 'route';

    public const TYPE_URL = 'url';

    public const TARGET_BLANK = '_blank';

    public const TARGET_DEFAULT = '_self';

    public const TARGET_PARENT = '_parent';

    public const TARGET_TOP = '_top';
}
