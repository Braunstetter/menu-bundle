<?php


namespace Braunstetter\MenuBundle\Items;


final class RouteMenuItem extends Item
{

    public function __construct(string $label, string $routeName, array $routeParameters, ?string $icon, ?array $options)
    {
        parent::__construct($label, $icon, $options);

        $this->setRouteName($routeName);
        $this->setRouteParameters($routeParameters);

        $this->setType(Item::TYPE_ROUTE);
    }

}