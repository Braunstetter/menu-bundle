<?php

namespace Braunstetter\MenuBundle\Contracts;

use Traversable;

interface MenuItemInterface
{
    public function getType(): string;
    public function getHandle(): string;
    public function getLabel(): string;
    public function setChildren(callable $children): static;
    public function getChildren(): array|Traversable;
    public function setTarget(string $target): static;
}