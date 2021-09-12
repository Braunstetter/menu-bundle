<?php

namespace Braunstetter\MenuBundle\Test\unit;

use Braunstetter\MenuBundle\Menu;
use Braunstetter\MenuBundle\Test\app\src\Menu\TestMenu;
use PHPUnit\Framework\TestCase;

class MenuTest extends TestCase
{
    private Menu $testMenu;

    protected function setUp() : void
    {
        parent::setUp();
        $this->testMenu = new TestMenu();
    }

    public function test_menu_returns_filled_array()
    {
        $this->assertIsArray(call_user_func($this->testMenu));
        $this->assertNotEmpty(call_user_func($this->testMenu));
    }

    public function test_handle_gets_created_correctly()
    {
        $this->assertSame($this->testMenu->handle, 'test_menu');
    }

}
