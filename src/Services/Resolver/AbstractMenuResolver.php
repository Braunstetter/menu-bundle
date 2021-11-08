<?php


namespace Braunstetter\MenuBundle\Services\Resolver;


use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Contracts\MenuResolverInterface;
use Braunstetter\MenuBundle\Items\MenuItem;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

abstract class AbstractMenuResolver implements MenuResolverInterface
{
    protected iterable $entries;
    private RequestStack $requestStack;
    private UrlGeneratorInterface $generator;
    protected string $selectedSubnavItem;

    /**
     * AbstractMenuResolver constructor.
     */
    public function __construct(iterable $entries, RequestStack $requestStack, UrlGeneratorInterface $generator)
    {
        $this->entries = $entries;
        $this->requestStack = $requestStack;
        $this->generator = $generator;
    }

    protected function matches(MenuItem $item): bool
    {
        if ($this->selectedSubnavItemMatches($item)) {
            $item->setCurrent(true);
            return true;
        }

        if (!$item->getRouteName()) {
            return false;
        }

        $uri = $this->generator->generate($item->getRouteName(), $item->getRouteParameters() ?: []);

        if ($uri === $this->requestStack->getCurrentRequest()?->getPathInfo()) {
            $item->setCurrent(true);
            return true;
        }

        return false;
    }

    protected function oneOfTheChildrenMatches(MenuItem $item): bool
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
    private function selectedSubnavItemMatches(MenuItemInterface $item): bool
    {
        if (!isset($this->selectedSubnavItem)) {
            return false;
        }

        return $item->handle === $this->selectedSubnavItem;
    }

    /**
     * @param $context
     * @return mixed
     */
    protected function setSubnavItem($context): void
    {
        if (array_key_exists('selectedSubnavItem', $context)) {
            $this->selectedSubnavItem = $context['selectedSubnavItem'];
        }
    }

}