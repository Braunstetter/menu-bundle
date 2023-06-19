<?php


namespace Braunstetter\MenuBundle\Items;


final class SystemMenuItem extends Item
{

    /**
     * @param array<string, string> $routeParameters
     * @param array<string, mixed>|null $options
     */
    public function __construct(string $label, string|null $routeName, array $routeParameters, ?string $icon, ?array $options = [])
    {
        parent::__construct($label, $icon, $options);

        $this->setRouteName($routeName);
        $this->setRouteParameters($routeParameters);
        $this->setType(Item::TYPE_ROUTE);

        $this->addClass('system');
    }

}