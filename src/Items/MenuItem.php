<?php


namespace Braunstetter\MenuBundle\Items;



class MenuItem
{
    public const TYPE_SECTION = 'section';
    public const TYPE_SYSTEM = 'system';
    public const TYPE_ROUTE = 'route';

    use MenuItemTrait;
}