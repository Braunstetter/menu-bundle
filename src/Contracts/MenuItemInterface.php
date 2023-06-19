<?php

namespace Braunstetter\MenuBundle\Contracts;

interface MenuItemInterface
{
    public function getType(): string;

    public function getLabel(): string;

    public function setChildren(callable $children): static;

    public function setInActiveTrail(bool $inActiveTrail): void;

    public function setCurrent(bool $current): void;

    public function getRouteName(): ?string;

    /**
     * @return array<string, string|int>|null
     */
    public function getRouteParameters(): ?array;

    /**
     * @return MenuItemInterface[]|iterable<MenuItemInterface>
     */
    public function getChildren(): iterable;

    public function hasChildren(): bool;

    public function setTarget(string $target): static;

    public function getUrl(): string;

    /**
     * @return array<int|string, bool|int|string>
     */
    public function getAttr(): array;

    /**
     * @return array<int|string, bool|int|string>
     */
    public function getLinkAttr(): array;
}