<?php


namespace Braunstetter\MenuBundle\Services;


use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Services\Resolver\BreadcrumbsResolver;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Menu
{

    private MenuResolver $menuResolver;
    private BreadcrumbsResolver $breadcrumbsResolver;

    /**
     * Menu constructor.
     * @param MenuResolver $menuResolver
     * @param BreadcrumbsResolver $breadcrumbsResolver
     */
    public function __construct(MenuResolver $menuResolver, BreadcrumbsResolver $breadcrumbsResolver)
    {
        $this->menuResolver = $menuResolver;
        $this->breadcrumbsResolver = $breadcrumbsResolver;
    }

    /**
     * @param array<string, mixed> $context
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getMenu(Environment $templating, array $context, string $name): string
    {
        return $templating->render('@Menu/menu.html.twig',
            [
                'menus' => $this->menuResolver->get($name, $context)
            ]
        );
    }

    /**
     * @param array<string, mixed> $context
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getBreadcrumbs(Environment $templating, array $context, string $name): string
    {
        return $templating->render('@Menu/breadcrumb_menu.html.twig',
            [
                'menus' => $this->breadcrumbsResolver->get($name, $context)
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