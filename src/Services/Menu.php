<?php


namespace Braunstetter\MenuBundle\Services;


use Braunstetter\MenuBundle\Items\MenuItem;
use Braunstetter\MenuBundle\Services\Resolver\BreadcrumbsResolver;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class Menu
{
    private iterable $entries;
    private RequestStack $requestStack;
    private UrlGeneratorInterface $generator;
    private Environment $templating;


    private mixed $selectedSubnavItem;
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
        $this->selectedSubnavItem = null;
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

}