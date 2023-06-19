<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\DependencyInjection;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class MenuBundleExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container->registerForAutoconfiguration(MenuInterface::class)
            ->addTag('menu');
    }
}
