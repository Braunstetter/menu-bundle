<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Services\Resolver;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Webmozart\Assert\Assert;

class MenuResolver extends AbstractMenuResolver
{
    /**
     * @param array<array-key, mixed> $context
     * @return MenuItemInterface[]
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
        $menuItems = $this->resolveMenu($menu);
        Assert::allIsInstanceOf(
            $menuItems,
            MenuItemInterface::class,
            'The callable must return an iterable of MenuItems'
        );

        foreach ($menuItems as $item) {
            $this->setCurrentStates($item);
            $result[] = $item;
        }

        return $result;
    }

    private function setCurrentStates(MenuItemInterface $item): void
    {
        if ($this->matches($item)) {
            return;
        }

        $this->oneOfTheChildrenMatches($item);
    }
}
