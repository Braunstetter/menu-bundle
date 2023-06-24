<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\app\src\Menu;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Factory\MenuItem;
use Braunstetter\MenuBundle\Items\Item;
use Braunstetter\MenuBundle\Items\UrlMenuItem;
use Traversable;

class UserTestMenu implements MenuInterface
{
    public function define(): Traversable
    {
        yield MenuItem::system('User', null, [], 'images/svg/system.svg')
            ->setRouteParameter('name', 'test_menu')
            ->setChildren(function () {
                yield MenuItem::section('Invoices')->setChildren(function () {
                    yield MenuItem::linkToRoute('Profile', 'test_two', [], '@Menu/svg/default_folder.svg');
                    yield MenuItem::linkToRoute('Orders', 'test_three')->setTarget(Item::TARGET_BLANK);

                    yield MenuItem::linkToUrl('Friends', 'https://blubber.com', Item::TARGET_BLANK);

                    yield new UrlMenuItem('Permissions', 'https://custom-target-by-linkattr.com', null, [
                        'linkAttr' => [
                            'target' => Item::TARGET_PARENT,
                        ],
                    ]);
                });
            });
    }
}
