<?php

namespace Container6msxD4P;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTestSubscriberService extends Braunstetter_MenuBundle_Test_app_src_TestKernelDevDebugContainer
{
    /**
     * Gets the public 'Braunstetter\MenuBundle\Test\app\src\Events\Subscriber\TestSubscriber' shared service.
     *
     * @return \Braunstetter\MenuBundle\Test\app\src\Events\Subscriber\TestSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/tests/app/src/Events/Subscriber/TestSubscriber.php';

        return $container->services['Braunstetter\\MenuBundle\\Test\\app\\src\\Events\\Subscriber\\TestSubscriber'] = new \Braunstetter\MenuBundle\Test\app\src\Events\Subscriber\TestSubscriber();
    }
}