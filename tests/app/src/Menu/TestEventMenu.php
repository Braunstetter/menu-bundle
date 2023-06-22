<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\app\src\Menu;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Events\MenuEvent;
use Braunstetter\MenuBundle\Factory\MenuItem;
use Generator;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Traversable;

class TestEventMenu implements MenuInterface
{
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function define(): Traversable
    {
        $items = function (): Generator {
            yield MenuItem::system('System', 'test', [], 'images/svg/system.svg')
                ->setRouteParameter('name', 'test_menu')
                ->setChildren(function () {
                    yield MenuItem::section('Section', 'test_one', [], 'images/svg/thunder.svg')->setChildren(
                        function () {
                            yield MenuItem::linkToRoute('Site', 'test_two', [], '@Menu/svg/default_folder.svg');
                            yield MenuItem::linkToRoute('Dashboard', 'test_three');
                        }
                    );
                });
        };

        $testMenuEvent = new MenuEvent($items);
        $this->eventDispatcher->dispatch($testMenuEvent, 'test.even_test');
        yield from $testMenuEvent->items;
    }
}
