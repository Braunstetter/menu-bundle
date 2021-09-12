<?php

namespace Braunstetter\MenuBundle;

use Braunstetter\MenuBundle\DependencyInjection\MenuBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MenuBundle extends Bundle
{
    public function getContainerExtension(): MenuBundleExtension
    {
        if (null === $this->extension) {
            $this->extension = new MenuBundleExtension();
        }

        return $this->extension;
    }
}