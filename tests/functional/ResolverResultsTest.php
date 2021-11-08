<?php

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Items\MenuItem;
use Braunstetter\MenuBundle\Items\UrlMenuItem;
use Braunstetter\MenuBundle\Services\Menu;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;

class ResolverResultsTest extends TestCase
{
    use TestKernelTrait;

    public function test_menu_resolver_returns_correct_output()
    {
        $menuResolver = $this->kernel->getContainer()->get(MenuResolver::class);
        $menu = $menuResolver->get('test_menu', []);

        $this->assertIsArray($menu);
        $this->assertSame(2, count($menu));
        $this->assertContainsOnlyInstancesOf(MenuItem::class, $menu);
        $this->assertTrue($menu[0]->hasChildren());
        $this->assertTrue($menu[1]->hasChildren());
    }

    public function test_menu_resolver_return_correct_url_menu_item_data()
    {
        $menuResolver = $this->kernel->getContainer()->get(MenuResolver::class);
        $menu = $menuResolver->get('test_menu', []);

        /** @var UrlMenuItem $item */
        $item = $menu[0]->getChildren()[0]->getChildren()[2];
        $this->assertSame($item->getTarget(), MenuItem::TARGET_BLANK);
        $this->assertSame($item->getType(), MenuItem::TYPE_URL);
        $this->assertNotNull($item->getUrl());
        $this->assertIsString($item->getUrl());
        $this->assertStringStartsWith('https://', $item->getUrl());
    }

    public function test_breadcrumb_resolver_returns_correct_output()
    {
        $menuService = $this->kernel->getContainer()->get(Menu::class);

        $menu = $menuService->getBreadcrumbsResult([], 'test_menu');
        $this->assertIsArray($menu);
        $this->assertSame(0, count($menu));

        $menu = $menuService->getBreadcrumbsResult(['selectedSubnavItem' => 'dashboard'], 'test_menu');
        $this->assertIsArray($menu);
        $this->assertSame(1, count($menu));
        $this->assertTrue($menu[0]->hasChildren());

        $menu = $menuService->getBreadcrumbsResult(['selectedSubnavItem' => 'system'], 'test_menu');

        $this->assertIsArray($menu);
        $this->assertSame(1, count($menu));
        $this->assertTrue($menu[0]->hasChildren());
    }

}