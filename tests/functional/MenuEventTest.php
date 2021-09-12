<?php

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Services\Menu;
use Braunstetter\MenuBundle\Test\app\src\Events\Subscriber\TestSubscriber;
use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;

class MenuEventTest extends TestCase
{
    use TestKernelTrait;

    public function test_event_triggers()
    {
        $menuService = $this->kernel->getContainer()->get(Menu::class);
        $results = $menuService->getMenuResult([],'test_event_menu');
        $this->assertSame(3, count($results));

        $this->assertSame('Prepended Item', $results[0]->getLabel());
        $this->assertSame('Appended Item', $results[2]->getLabel());
    }
    
}
