<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Services\Menu;
use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;

class MenuEventTest extends TestCase
{
    use TestKernelTrait;

    public function testEventTriggers(): void
    {
        Assert::notNull($this->kernel);
        $menuService = $this->kernel->getContainer()
            ->get(Menu::class);
        $this->assertInstanceOf(Menu::class, $menuService);
        $results = $menuService->getMenuResult([], 'test_event_menu');
        $this->assertSame(3, count($results));

        $this->assertSame('Prepended Item', $results[0]->getLabel());
        $this->assertSame('Appended Item', $results[2]->getLabel());
    }
}
