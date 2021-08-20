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
    private Environment $templating;

    private MenuResolver $menuResolver;
    private BreadcrumbsResolver $breadcrumbsResolver;

    /**
     * Menu constructor.
     * @param Environment $templating
     * @param MenuResolver $menuResolver
     * @param BreadcrumbsResolver $breadcrumbsResolver
     */
    public function __construct(Environment $templating, MenuResolver $menuResolver, BreadcrumbsResolver $breadcrumbsResolver)
    {
        $this->templating = $templating;
        $this->menuResolver = $menuResolver;
        $this->breadcrumbsResolver = $breadcrumbsResolver;
    }

    /**
     * @param $context
     * @param $name
     * @return string
     * @throws RuntimeError
     * @throws LoaderError
     * @throws SyntaxError
     */
    public function getMenu($context, $name): string
    {
        return $this->templating->render('@Menu/menu.html.twig',
            [
                'menus' => $this->menuResolver->get($name, $context)
            ]
        );
    }

    /**
     * @param $context
     * @param $name
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function getBreadcrumbs($context, $name): string
    {
        return $this->templating->render('@Menu/breadcrumb_menu.html.twig',
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