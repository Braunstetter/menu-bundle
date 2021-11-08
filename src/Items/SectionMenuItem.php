<?php


namespace Braunstetter\MenuBundle\Items;


final class SectionMenuItem extends MenuItem
{

    public function __construct(string $label, string $routeName, array $routeParameters, ?string $icon)
    {
        parent::__construct($label, $icon);

        $this->setRouteName($routeName);
        $this->setRouteParameters($routeParameters);

        $this->setType(MenuItem::TYPE_SECTION);
    }

}