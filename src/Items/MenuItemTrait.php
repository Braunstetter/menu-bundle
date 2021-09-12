<?php


namespace Braunstetter\MenuBundle\Items;


use Symfony\Component\String\UnicodeString;
use Traversable;
use function count;

trait MenuItemTrait
{
    private string $type;
    private string $label;
    private ?string $icon;
    private ?string $routeName;
    private ?array $routeParameters;
    private array|Traversable $children;
    private bool $current;
    private bool $inActiveTrail;
    public string $handle;

    public function __construct(string $label, string $routeName, array $routeParameters, ?string $icon)
    {
        $this->children = [];
        $this->current = false;
        $this->inActiveTrail = false;

        $this->setLabel($label);
        $this->setIcon($icon);
        $this->setRouteName($routeName);
        $this->setRouteParameters($routeParameters);

        $this->handle = (new UnicodeString($this->label))->snake()->toString();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    public function getRouteName(): ?string
    {
        return $this->routeName;
    }

    public function setRouteName(?string $routeName): static
    {
        $this->routeName = $routeName;
        return $this;
    }

    public function getRouteParameters(): ?array
    {
        return $this->routeParameters;
    }

    public function setRouteParameter(string $parameterName, $parameterValue): static
    {
        $this->routeParameters[$parameterName] = $parameterValue;
        return $this;
    }

    public function setRouteParameters(?array $routeParameters): static
    {
        $this->routeParameters = $routeParameters;
        return $this;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        if (!is_array($this->children)) {
            $this->children = iterator_to_array($this->children, false);
        }

        return $this->children;
    }

    public function setChildren(callable $children): static
    {
        $this->children = call_user_func($children);
        return $this;
    }

    public function hasChildren(): bool
    {
        if ($this->children instanceof Traversable) {
            $this->children = iterator_to_array($this->children);
        }

        return count($this->children) > 0;
    }

    /**
     * @return bool
     */
    public function isCurrent(): bool
    {
        return $this->current;
    }

    /**
     * @param bool $current
     */
    public function setCurrent(bool $current): void
    {
        $this->current = $current;
    }

    /**
     * @return bool
     */
    public function isInActiveTrail(): bool
    {
        return $this->inActiveTrail;
    }

    /**
     * @param bool $inActiveTrail
     */
    public function setInActiveTrail(bool $inActiveTrail): void
    {
        $this->inActiveTrail = $inActiveTrail;
    }

}