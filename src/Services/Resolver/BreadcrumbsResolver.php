<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Services\Resolver;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Webmozart\Assert\Assert;

class BreadcrumbsResolver extends AbstractMenuResolver
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
     * @return  array<MenuItemInterface>
     */
    private function resolve(MenuInterface $menu, array $result): array
    {
        $menuItems = call_user_func($menu);
        Assert::allIsInstanceOf(
            $menuItems,
            MenuItemInterface::class,
            'The callable must return an iterable of MenuItems'
        );

        /** @var MenuItemInterface $item */
        foreach ($menuItems as $item) {
            $crumb = $this->findBreadCrumb($item);
            if ($crumb) {
                $result[] = $item;
                break;
            }
        }

        return $result;
    }

    private function findBreadCrumb(MenuItemInterface $item): MenuItemInterface|bool
    {
        if ($this->matches($item)) {
            return $item;
        }

        if ($this->oneOfTheChildrenMatches($item)) {
            return $item;
        }

        return false;
    }
}
