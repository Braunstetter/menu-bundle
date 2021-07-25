<?php


namespace Braunstetter\MenuBundle\Twig;


use Braunstetter\MenuBundle\Services\Menu;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class Extension extends AbstractExtension
{
    private Menu $menu;
    private Environment $templating;

    public function __construct(Menu $menu, Environment $templating)
    {
        $this->menu = $menu;
        $this->templating = $templating;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('menu', [$this, 'getMenu'], ['is_safe' => ['html'], 'needs_context' => true])
        ];
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function getMenu($context, $name): string
    {

        $selectedSubnavItem = array_key_exists('selectedSubnavItem', $context)
            ? $context['selectedSubnavItem']
            : null;

        return $this->templating->render('@Menu/menu.html.twig',
            [
                'menus' => $this->menu->getTree($name, $selectedSubnavItem)
            ]
        );
    }
}