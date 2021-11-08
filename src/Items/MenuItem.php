<?php


namespace Braunstetter\MenuBundle\Items;



use Braunstetter\MenuBundle\Contracts\MenuItemInterface;

class MenuItem implements MenuItemInterface
{
    public const TYPE_SECTION = 'section';
    public const TYPE_SYSTEM = 'system';
    public const TYPE_ROUTE = 'route';
    public const TYPE_URL = 'url';

    public const TARGET_BLANK = '_blank';
    public const TARGET_DEFAULT = '_self';
    public const TARGET_PARENT = '_parent';
    public const TARGET_TOP = '_top';


    use MenuItemTrait;
}