<?php


namespace Braunstetter\MenuBundle\Factory;


use Braunstetter\MenuBundle\Items\RouteMenuItem;
use Braunstetter\MenuBundle\Items\SectionMenuItem;
use Braunstetter\MenuBundle\Items\SystemMenuItem;
use Braunstetter\MenuBundle\Items\UrlMenuItem;

final class MenuItem
{

    public static function linkToRoute(string $label, string $routeName, array $routeParameters = [], ?string $icon = null, ?array $options = []): RouteMenuItem
    {
        return new RouteMenuItem($label, $routeName, $routeParameters, $icon, $options);
    }

    public static function linkToUrl(string $label, string $url, ?string $target = null, ?string $icon = null, ?array $options = []): UrlMenuItem
    {
        if ($target) {
            $options = array_replace($options, ['target' => $target]);
        }

        return new UrlMenuItem($label, $url, $icon, $options);
    }

    public static function section(string $label, string|null $routeName = null, array $routeParameters = [], ?string $icon = null, ?array $options = []): SectionMenuItem
    {
        return new SectionMenuItem($label, $routeName, $routeParameters, $icon, $options);
    }

    public static function system(string $label, string|null $routeName = null, array $routeParameters = [], ?string $icon = null, ?array $options = []): SystemMenuItem
    {
        return new SystemMenuItem($label, $routeName, $routeParameters, $icon, $options);
    }

}