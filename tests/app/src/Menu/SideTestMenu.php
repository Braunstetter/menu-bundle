<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\app\src\Menu;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Factory\MenuItem;
use Braunstetter\MenuBundle\Items\Item;
use Braunstetter\MenuBundle\Items\UrlMenuItem;
use Traversable;

class SideTestMenu implements MenuInterface
{
    public function define(): Traversable
    {
        yield MenuItem::system('Shop', null, [], 'images/svg/system.svg')
            ->setRouteParameter('name', 'test_menu')
            ->setChildren(function () {
                yield MenuItem::section('Invoices')->setChildren(function () {
                    yield MenuItem::linkToRoute('Current', 'test_two', [], '@Menu/svg/default_folder.svg');
                    yield MenuItem::linkToRoute('Last year', 'test_three')->setTarget(Item::TARGET_BLANK);

                    yield MenuItem::linkToUrl('Extern', 'https://blubber.com', Item::TARGET_BLANK);

                    yield new UrlMenuItem('API', 'https://custom-target-by-linkattr.com', null, [
                        'linkAttr' => [
                            'target' => Item::TARGET_PARENT,
                        ],
                    ]);
                });
            });

        yield MenuItem::system('CMS', 'test', [
            'name' => 'test_menu',
        ], 'images/svg/system.svg')->setChildren(function () {
            yield MenuItem::section('BLOG', 'test_one', [], 'images/svg/thunder.svg')
                ->setTarget(Item::TARGET_PARENT)

                ->setChildren(function () {
                    yield MenuItem::linkToRoute('Pages', 'test_two', [], '@Menu/svg/default_folder.svg')->setTarget(
                        Item::TARGET_DEFAULT
                    );
                    yield MenuItem::linkToRoute('Blocks', 'test_three')->setTarget(Item::TARGET_TOP);
                });
        });
    }
}
