<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\unit;

use Braunstetter\MenuBundle\Menu;
use Braunstetter\MenuBundle\Test\app\src\Menu\TestMenu;
use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    private Menu $testMenu;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testMenu = new TestMenu();
    }

    public function testMenuReturnsFilledArray(): void
    {
        $this->assertIsArray(call_user_func($this->testMenu));
        $this->assertNotEmpty(call_user_func($this->testMenu));
    }
}
