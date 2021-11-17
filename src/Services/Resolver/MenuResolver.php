<?php


namespace Braunstetter\MenuBundle\Services\Resolver;


use Braunstetter\MenuBundle\Items\Item;

class MenuResolver extends AbstractMenuResolver
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

    private function setCurrentStates(Item $item): void
    {
        if ($this->matches($item)) {
            return;
        }

        $this->oneOfTheChildrenMatches($item);
    }
}