<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle;

use Braunstetter\MenuBundle\DependencyInjection\MenuBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Webmozart\Assert\Assert;

class MenuBundle extends Bundle
{
    public function getContainerExtension(): ?MenuBundleExtension
    {
        if ($this->extension === null) {
            $this->extension = new MenuBundleExtension();
        }
        Assert::isInstanceOf(
            $this->extension,
            MenuBundleExtension::class,
            'The extension must be an instance of MenuBundleExtension'
        );
        return $this->extension;
    }
}
