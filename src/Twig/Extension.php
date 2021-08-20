<?php


namespace Braunstetter\MenuBundle\Twig;


use Braunstetter\MenuBundle\Services\Menu;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{
    private Menu $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('menu', [$this->menu, 'getMenu'], ['is_safe' => ['html'], 'needs_context' => true]),
            new TwigFunction('menu_result', [$this->menu, 'getMenuResult'], ['needs_context' => true]),
            new TwigFunction('breadcrumbs', [$this->menu, 'getBreadcrumbs'], ['is_safe' => ['html'], 'needs_context' => true]),
            new TwigFunction('breadcrumbs_result', [$this->menu, 'getBreadcrumbsResult'], ['is_safe' => ['html'], 'needs_context' => true])
        ];
    }

}