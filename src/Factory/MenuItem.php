<?php


namespace Braunstetter\MenuBundle\Factory;


use Braunstetter\MenuBundle\Items\RouteMenuItem;
use Braunstetter\MenuBundle\Items\SectionMenuItem;
use Braunstetter\MenuBundle\Items\SystemMenuItem;
use Braunstetter\MenuBundle\Items\UrlMenuItem;
use Braunstetter\MenuBundle\Items\MenuItem as Item;

final class MenuItem
{

    public static function linkToRoute(string $label, string $routeName, array $routeParameters = [], ?string $icon = null): RouteMenuItem
    {
        return new RouteMenuItem($label, $routeName, $routeParameters, $icon);
    }

    public static function section(string $label, string $routeName, array $routeParameters = [], ?string $icon = null): SectionMenuItem
    {
        return new SectionMenuItem($label, $routeName, $routeParameters, $icon);
    }

    public static function system(string $label, string $routeName, array $routeParameters = [], ?string $icon = null): SystemMenuItem
    {
        return new SystemMenuItem($label, $routeName, $routeParameters, $icon);
    }

    public static function linkToUrl(string $label, string $url, ?string $target = null, ?string $icon = null): UrlMenuItem
    {
        return new UrlMenuItem($label, $url, $icon, ['linkAttr' => ['target' => $target ?: Item::TARGET_DEFAULT]]);
    }

}