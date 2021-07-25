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
            new TwigFunction('menu', [$this->menu, 'getMenu'], ['is_safe' => ['html'], 'needs_context' => true])
        ];
    }

}