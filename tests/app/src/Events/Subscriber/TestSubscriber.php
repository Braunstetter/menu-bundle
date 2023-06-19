<?php

namespace Braunstetter\MenuBundle\Test\app\src\Events\Subscriber;

use Braunstetter\MenuBundle\Events\MenuEvent;
use Braunstetter\MenuBundle\Factory\MenuItem;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TestSubscriber implements EventSubscriberInterface
{

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return ['test.even_test' => 'addTestItems'];
    }

    public function addTestItems(MenuEvent $event): void
    {
        $event->prepend(function () {
          yield MenuItem::system('Prepended Item', 'test') ->setRouteParameter('name', 'test_menu');
        });

        $event->append(function () {
          yield MenuItem::system('Appended Item', 'test') ->setRouteParameter('name', 'test_menu');
        });
    }
}