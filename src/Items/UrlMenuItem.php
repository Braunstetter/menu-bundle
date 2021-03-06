<?php

namespace Braunstetter\MenuBundle\Items;


final class UrlMenuItem extends Item
{

    public function __construct(string $label, string $url, ?string $icon, ?array $options)
    {
        parent::__construct($label, $icon, $options);

        $this->url = $url;

        $this->setType(Item::TYPE_URL);
    }

}