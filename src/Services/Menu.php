<?php


namespace Braunstetter\MenuBundle\Services;


use Braunstetter\MenuBundle\Items\MenuItem;
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

    /**
     * Menu constructor.
     * @param iterable $entries
     * @param RequestStack $requestStack
     * @param UrlGeneratorInterface $generator
     * @param Environment $templating
     */
    public function __construct(iterable $entries, RequestStack $requestStack, UrlGeneratorInterface $generator, Environment $templating)
    {
        $this->entries = $entries;
        $this->requestStack = $requestStack;
        $this->generator = $generator;
        $this->selectedSubnavItem = null;
        $this->templating = $templating;
    }

    /**
     * @param $context
     * @param $name
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @return string
     */
    public function getMenu($context, $name): string
    {

        $selectedSubnavItem = array_key_exists('selectedSubnavItem', $context)
            ? $context['selectedSubnavItem']
            : null;

        return $this->templating->render('@Menu/menu.html.twig',
            [
                'menus' => $this->getTree($name, $selectedSubnavItem)
            ]
        );
    }

    public function getTree($name, $selectedSubnavItem): array
    {
        if (isset($selectedSubnavItem)) $this->selectedSubnavItem = $selectedSubnavItem;

        $result = [];

        foreach ($this->entries as $menu) {
            if ($menu->handle === $name) {
                $result = $this->resolve($menu, $result);
            }
        }

        return $result;
    }

    /**
     * @param mixed $menu
     * @param array $result
     * @return array
     */
    private function resolve(mixed $menu, array $result): array
    {
        foreach (call_user_func($menu) as $item) {
            $this->setCurrentStates($item);
            $result[] = $item;
        }

        return $result;
    }

    private function setCurrentStates(MenuItem $item): void
    {
        if ($this->matches($item)) {
            return;
        }

        $this->oneOfTheChildrenMatches($item);
    }

    private function matches(MenuItem $item): bool
    {
        if ($this->selectedSubnavItemMatches($item)) {
            $item->setCurrent(true);
            return true;
        }

        $uri = $this->generator->generate($item->getRouteName());

        if ($uri === $this->requestStack->getCurrentRequest()->getPathInfo()) {
            $item->setCurrent(true);
            return true;
        }

        return false;
    }

    private function oneOfTheChildrenMatches(MenuItem $item): bool
    {
        if (!empty($item->getChildren())) {

            foreach ($item->getChildren() as $subItem) {

                if ($this->matches($subItem)) {
                    $item->setInActiveTrail(true);
                    return true;
                }

                if ($this->oneOfTheChildrenMatches($subItem)) {
                    $item->setInActiveTrail(true);
                    return true;
                }

            }
        }

        return false;
    }

    /**
     * @param MenuItem $item
     * @return bool
     */
    private function selectedSubnavItemMatches(MenuItem $item): bool
    {
        return $item->handle === $this->selectedSubnavItem;
    }


}