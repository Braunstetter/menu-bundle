<?php


namespace Braunstetter\MenuBundle\Items;


final class SectionMenuItem extends MenuItem
{

    public function __construct(string $label, string $routeName, array $routeParameters, ?string $icon)
    {
        parent::__construct($label, $routeName, $routeParameters, $icon);

        $this->setType(MenuItem::TYPE_SECTION);
    }

}