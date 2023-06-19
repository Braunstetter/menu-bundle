<?php


namespace Braunstetter\MenuBundle\Services\Resolver;


use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Items\Item;
use Webmozart\Assert\Assert;

class MenuResolver extends AbstractMenuResolver
{

    /**
     * @param array<string, mixed> $context
     */
    public function get(string $name, array $context): array
    {
        $this->setSubnavItem($context);

        $result = [];

        foreach ($this->entries as $menu) {
            if ($this->getHandle($menu) === $name) {
                $result = $this->resolve($menu, $result);
            }
        }

        return $result;
    }

    /**
     * @param MenuItemInterface[] $result
     * @return  MenuItemInterface[]
     */
    private function resolve(MenuInterface $menu, array $result): array
    {
        $menuItems = call_user_func($menu);
        Assert::isIterable($menuItems, 'The menu must return an iterable of menu items');

        foreach ($menuItems as $item) {
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