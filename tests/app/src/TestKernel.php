<?php

namespace Braunstetter\MenuBundle\Test\app\src;

use Braunstetter\MenuBundle\MenuBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class TestKernel extends Kernel
{
    use MicroKernelTrait;

    /**
     * @inheritDoc
     */
    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new MenuBundle()
        ];
    }

    protected function configureContainer(ContainerConfigurator $container)
    {
        $container->extension('framework', [
            'secret' => "F00",
            'router' => ['utf8' => true]
        ]);

        $container->extension('twig', [
            'paths' => ['tests/app/src/Resources/views' => '__main__']
        ]);

        $container->import('Resources/config/services.test.yaml');
        $container->import('Resources/config/controller.test.yaml');
    }

    protected function configureRoutes(RoutingConfigurator $routes)
    {
        $routes->import(__DIR__ . '/Resources/config/routes.test.yaml');
    }

}