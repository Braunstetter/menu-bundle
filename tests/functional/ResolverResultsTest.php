<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Items\Item;
use Braunstetter\MenuBundle\Services\Menu;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Webmozart\Assert\Assert;

class ResolverResultsTest extends TestCase
{
    use TestKernelTrait;

    public function testMenuResolverReturnsCorrectOutput(): void
    {
        Assert::notNull($this->kernel);

        /** @var MenuResolver $menuResolver */
        $menuResolver = $this->kernel->getContainer()
            ->get(MenuResolver::class);

        $menu = $menuResolver->get('test_menu', []);

        $this->assertSame(2, count($menu));
        $this->assertContainsOnlyInstancesOf(Item::class, $menu);
        $this->assertTrue($menu[0]->hasChildren());
        $this->assertTrue($menu[1]->hasChildren());
    }

    public function testMenuResolverReturnCorrectUrlMenuItemData(): void
    {
        Assert::notNull($this->kernel);
        /** @var MenuResolver $menuResolver */
        $menuResolver = $this->kernel->getContainer()
            ->get(MenuResolver::class);

        $menu = $menuResolver->get('test_menu', []);

        $childrenOfFirstItem = $this->getChildrenOfFirstItem($menu);
        $childrenOfSecondItem = $this->getChildrenOfFirstItem($childrenOfFirstItem);
        $item = $childrenOfSecondItem[2];
        $url = $item->getUrl();
        $this->assertSame($item->getLinkAttr()['target'], Item::TARGET_BLANK);
        $this->assertSame($item->getType(), Item::TYPE_URL);
        $this->assertNotNull($url);
        $this->assertIsString($item->getUrl());
        $this->assertStringStartsWith('https://', $url);
    }

    public function testBreadcrumbResolverReturnsCorrectOutput(): void
    {
        Assert::notNull($this->kernel);
        /** @var Menu $menuService */
        $menuService = $this->kernel->getContainer()
            ->get(Menu::class);

        $menu = $menuService->getBreadcrumbsResult([], 'test_menu');
        $this->assertSame(0, count($menu));

        $menu = $menuService->getBreadcrumbsResult([
            'selectedSubnavItem' => 'dashboard',
        ], 'test_menu');
        $this->assertSame(1, count($menu));
        $this->assertTrue($menu[0]->hasChildren());

        $menu = $menuService->getBreadcrumbsResult([
            'selectedSubnavItem' => 'system',
        ], 'test_menu');

        $this->assertSame(1, count($menu));
        $this->assertTrue($menu[0]->hasChildren());
    }

    public function testMenuResolverCanResolverMultipleSubnavItems(): void
    {
        Assert::notNull($this->kernel);
        /** @var Menu $menuService */
        $menuService = $this->kernel->getContainer()
            ->get(Menu::class);

        $menu = $menuService->getMenuResult([
            'selectedSubnavItem' => ['api', 'pages'],
        ], 'side_test_menu');

        $this->assertSame(2, count($menu));
        $this->testItemIsCurrent(menu: $menu, label: 'API');
        $this->testItemIsCurrent(menu: $menu, label: 'Pages', propertyPath: '[1].children[0].children');
    }

    /**
     * @param MenuItemInterface[] $array
     * @return array<MenuItemInterface>
     */
    private function getChildrenOfFirstItem(array $array): array
    {
        $childrenOfFirstItem = $array[0]->getChildren();
        Assert::isArray($childrenOfFirstItem);
        return $childrenOfFirstItem;
    }

    /**
     * @param MenuItemInterface[] $menu
     */
    private function testItemIsCurrent(
        array $menu,
        string $label,
        string $propertyPath = '[0].children[0].children'
    ): void {
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        /** @var MenuItemInterface[] $items */
        $items = $propertyAccessor->getValue($menu, $propertyPath);

        $pagesItems = array_filter($items, function (MenuItemInterface $item) use ($label) {
            return $item->getLabel() === $label;
        });

        $pagesItem = reset($pagesItems);

        $this->assertInstanceOf(MenuItemInterface::class, $pagesItem);
        $this->assertTrue($pagesItem->isCurrent());
    }
}
