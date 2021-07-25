<?php

namespace Braunstetter\MenuBundle;

use Braunstetter\MenuBundle\DependencyInjection\MenuBundleExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MenuBundle extends Bundle
{
    public function getContainerExtension(): bool|MenuBundleExtension|ExtensionInterface|null
    {
        if (null === $this->extension) {
            $this->extension = new MenuBundleExtension();
        }

        return $this->extension;
    }
}