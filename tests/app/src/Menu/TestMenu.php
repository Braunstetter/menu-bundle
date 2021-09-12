<?php

namespace Braunstetter\MenuBundle\Test\app\src\Menu;

use Braunstetter\MenuBundle\Factory\MenuItem;
use Braunstetter\MenuBundle\Menu;
use Traversable;

class TestMenu extends Menu
{
    public function define(): Traversable
    {
        yield MenuItem::system('System', 'test', [], 'images/svg/system.svg')
            ->setRouteParameter('name', 'test_menu')
            ->setChildren(function () {
                yield MenuItem::section('Section', 'test_one', [], 'images/svg/thunder.svg')->setChildren(function () {
                    yield MenuItem::linkToRoute('Site', 'test_two', [], '@Menu/svg/default_folder.svg');
                    yield MenuItem::linkToRoute('Dashboard', 'test_three');
                });
            });

        yield MenuItem::system('System', 'test', ['name' => 'test_menu'], 'images/svg/system.svg')->setChildren(function () {
            yield MenuItem::section('Section', 'test_one', [], 'images/svg/thunder.svg')->setChildren(function () {
                yield MenuItem::linkToRoute('Site', 'test_two', [], '@Menu/svg/default_folder.svg');
                yield MenuItem::linkToRoute('Dashboard', 'test_three');
            });
        });


    }
}