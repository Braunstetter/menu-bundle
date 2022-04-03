<?php

namespace Braunstetter\MenuBundle\Test\app\src\Menu;

use Braunstetter\MenuBundle\Factory\MenuItem;
use Braunstetter\MenuBundle\Items\UrlMenuItem;
use Braunstetter\MenuBundle\Menu;
use Traversable;
use Braunstetter\MenuBundle\Items\Item;

class TestMenu extends Menu
{
    public function define(): Traversable
    {
        yield MenuItem::system('System', null, [], 'images/svg/system.svg')
            ->setRouteParameter('name', 'test_menu')
            ->setChildren(function () {
                yield MenuItem::section('Section')->setChildren(function () {
                    yield MenuItem::linkToRoute('Site', 'test_two', [], '@Menu/svg/default_folder.svg');
                    yield MenuItem::linkToRoute('Dashboard', 'test_three')->setTarget(Item::TARGET_BLANK);

                    yield MenuItem::linkToUrl('UrlTest', 'https://blubber.com', Item::TARGET_BLANK);

                    yield (new UrlMenuItem('PlainUrlItemTest','https://custom-target-by-linkattr.com', null, ['linkAttr' => ['target' => Item::TARGET_PARENT]]));
                });
            });

        yield MenuItem::system('System', 'test', ['name' => 'test_menu'], 'images/svg/system.svg')->setChildren(function () {
            yield MenuItem::section('Section', 'test_one', [], 'images/svg/thunder.svg')
                ->setTarget(Item::TARGET_PARENT)

                ->setChildren(function () {
                    yield MenuItem::linkToRoute('Site', 'test_two', [], '@Menu/svg/default_folder.svg')->setTarget(Item::TARGET_DEFAULT);
                    yield MenuItem::linkToRoute('Dashboard', 'test_three')->setTarget(Item::TARGET_TOP);
                });
        });


    }
}