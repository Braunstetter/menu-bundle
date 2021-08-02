<?php


namespace Braunstetter\MenuBundle\Services\Resolver;


use Braunstetter\MenuBundle\Items\MenuItem;

class BreadcrumbsResolver extends AbstractMenuResolver
{

    public function get($name, $context): array
    {
        $this->setSubnavItem($context);

        $result = [];

        foreach ($this->entries as $menu) {
            if ($menu->handle === $name) {
                $result = $this->resolve($menu, $result);
            }
        }

        return $result;
    }

    private function resolve($menu, mixed $result)
    {
        foreach (call_user_func($menu) as $item) {
            $crumb = $this->findBreadCrumb($item);

            if ($crumb) {
                $result[] = $item;
                break;
            }
        }

        return $result;
    }

    private function findBreadCrumb(MenuItem $item): MenuItem|bool
    {
        if ($this->matches($item)) {
            return false;
        }

        if ($this->oneOfTheChildrenMatches($item)) {
            return $item;
        }

        return false;
    }
}