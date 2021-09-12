<?php


namespace Braunstetter\MenuBundle\Services;


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
     * @param Environment $templating
     * @param $context
     * @param $name
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getMenu(Environment $templating, $context, $name): string
    {
        return $templating->render('@Menu/menu.html.twig',
            [
                'menus' => $this->menuResolver->get($name, $context)
            ]
        );
    }

    /**
     * @param Environment $templating
     * @param $context
     * @param $name
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getBreadcrumbs(Environment $templating, $context, $name): string
    {
        return $templating->render('@Menu/breadcrumb_menu.html.twig',
            [
                'menus' => $this->breadcrumbsResolver->get($name, $context)
            ]
        );
    }

    public function getMenuResult($context, $name): array
    {
        return $this->menuResolver->get($name, $context);
    }

    public function getBreadcrumbsResult($context, $name): array
    {
        return $this->breadcrumbsResolver->get($name, $context);
    }

}