<?php

namespace Braunstetter\MenuBundle\Test\twig;


use Braunstetter\MenuBundle\Services\Menu;
use Braunstetter\MenuBundle\Services\Resolver\BreadcrumbsResolver;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Braunstetter\MenuBundle\Twig\Extension;
use Twig\Test\IntegrationTestCase;

class FunctionalTest
{
    public function getExtensions() : array
    {
        $menuResolver = new MenuResolver();
        $breadcrumpResolver = new BreadcrumbsResolver();

        $menuService = new Menu();

        return [
            new Extension(),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getFixturesDir(): string
    {
        return __DIR__ . "/Fixtures";
    }

}