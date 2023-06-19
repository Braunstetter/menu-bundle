<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Services;

use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Services\Resolver\BreadcrumbsResolver;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Twig\Environment;

class Menu
{
    private MenuResolver $menuResolver;

    private BreadcrumbsResolver $breadcrumbsResolver;

    public function __construct(MenuResolver $menuResolver, BreadcrumbsResolver $breadcrumbsResolver)
    {
        $this->menuResolver = $menuResolver;
        $this->breadcrumbsResolver = $breadcrumbsResolver;
    }

    /**
     * @param array<string, mixed> $context
     */
    public function getMenu(Environment $templating, array $context, string $name): string
    {
        return $templating->render(
            '@Menu/menu.html.twig',
            [
                'menus' => $this->menuResolver->get($name, $context),
            ]
        );
    }

    /**
     * @param array<string, mixed> $context
     */
    public function getBreadcrumbs(Environment $templating, array $context, string $name): string
    {
        return $templating->render(
            '@Menu/breadcrumb_menu.html.twig',
            [
                'menus' => $this->breadcrumbsResolver->get($name, $context),
            ]
        );
    }

    /**
     * @param array<string, mixed> $context
     * @return array<MenuItemInterface>
     */
    public function getMenuResult(array $context, string $name): array
    {
        return $this->menuResolver->get($name, $context);
    }

    /**
     * @param array<string, mixed> $context
     * @return array<MenuItemInterface>
     */
    public function getBreadcrumbsResult(array $context, string $name): array
    {
        return $this->breadcrumbsResolver->get($name, $context);
    }
}
