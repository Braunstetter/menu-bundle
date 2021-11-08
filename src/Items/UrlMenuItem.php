<?php

namespace Braunstetter\MenuBundle\Items;


final class UrlMenuItem extends MenuItem
{

    public function __construct(string $label, string $url, ?string $target, ?string $icon)
    {
        parent::__construct($label, $icon);

        $this->url = $url;
        $this->target = $target ?: '_self';

        $this->setType(MenuItem::TYPE_URL);
    }

}