<?php

namespace ContainerNaUkzx3;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMenuResolverService extends Braunstetter_MenuBundle_Test_app_src_TestKernelDevDebugContainer
{
    /**
     * Gets the public 'Braunstetter\MenuBundle\Services\Resolver\MenuResolver' shared service.
     *
     * @return \Braunstetter\MenuBundle\Services\Resolver\MenuResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Contracts/MenuResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/src/Services/Resolver/AbstractMenuResolver.php';
        include_once \dirname(__DIR__, 4).'/src/Services/Resolver/MenuResolver.php';

        return $container->services['Braunstetter\\MenuBundle\\Services\\Resolver\\MenuResolver'] = new \Braunstetter\MenuBundle\Services\Resolver\MenuResolver(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['Braunstetter\\MenuBundle\\Test\\app\\src\\Menu\\TestMenu'] ?? ($container->privates['Braunstetter\\MenuBundle\\Test\\app\\src\\Menu\\TestMenu'] = new \Braunstetter\MenuBundle\Test\app\src\Menu\TestMenu()));
            yield 1 => ($container->privates['Braunstetter\\MenuBundle\\Test\\app\\src\\Menu\\TestEventMenu'] ?? $container->load('getTestEventMenuService'));
        }, 2), ($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($container->services['router'] ?? $container->getRouterService()));
    }
}
