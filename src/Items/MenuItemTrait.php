<?php


namespace Braunstetter\MenuBundle\Items;

use Braunstetter\Helper\Arr;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Symfony\Component\String\UnicodeString;
use Traversable;
use Webmozart\Assert\Assert;

trait MenuItemTrait
{
    private ?string $type = null;
    private ?string $label = null;
    private ?string $icon = null;
    private ?string $routeName = null;

    /**
     * @var array<string, int|string>
     */
    private ?array $routeParameters = null;

    /**
     * @var MenuItemInterface[]|iterable<MenuItemInterface>
     */
    private iterable $children = [];
    private bool $current = false;
    private bool $inActiveTrail = false;
    public ?string $url = null;

    /**
     * @var array<int|string, bool|int|string>
     */
    public array $attr = [];

    /**
     * @var array<int|string, bool|int|string>
     */
    public array $linkAttr = [];

    /**
     * @param array<string, mixed>|null $options
     */
    public function __construct(string $label, ?string $icon, ?array $options = [])
    {
        $this->setLabel($label);
        $this->setIcon($icon);

        $attr = $options['attr'] ?? [];
        Assert::isArray($attr, 'The attr option must be an array, %s given.');
        /** @var array<int|string, bool|int|string> $attr */
        $this->setAttributes($attr);

        $linkAttr = $options['linkAttr'] ?? [];
        Assert::isArray($linkAttr, 'The linkAttr option must be an array, %s given.');
        /** @var array<int|string, bool|int|string> $linkAttr */
        $this->setLinkAttributes($linkAttr);

        if (isset($options['target'])) {
            $target = $options['target'];
            Assert::string($target, 'The target option must be a string, %s given.');
            $this->setTarget($target);
        }
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getLabel(): ?string
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
        return $this->routeName ?? null;
    }

    public function setRouteName(?string $routeName): static
    {
        $this->routeName = $routeName;
        return $this;
    }

    /**
     * @return array<string, string|int>|null
     */
    public function getRouteParameters(): ?array
    {
        return $this->routeParameters;
    }

    public function setRouteParameter(string $parameterName, string|int $parameterValue): static
    {
        $this->routeParameters[$parameterName] = $parameterValue;
        return $this;
    }

    /**
     * @param array<string, string|int>|null $routeParameters
     */
    public function setRouteParameters(?array $routeParameters): static
    {
        $this->routeParameters = $routeParameters;
        return $this;
    }

    /**
     * @return MenuItemInterface[]|iterable<MenuItemInterface>
     */
    public function getChildren(): iterable
    {
        if ($this->children instanceof Traversable) {
            $this->children = iterator_to_array($this->children, false);
        }

        return $this->children;
    }

    public function setChildren(callable $children): static
    {
        $traversableResult = call_user_func($children);
        Assert::isInstanceOf($traversableResult, Traversable::class, 'The children must be an instance of %s.');
        $result = iterator_to_array($traversableResult);
        Assert::allIsInstanceOf($result, MenuItemInterface::class, 'All children must be an instance of %s.');
        $this->children = $result;
        return $this;
    }

    public function hasChildren(): bool
    {
        if ($this->children instanceof Traversable) {
            $this->children = iterator_to_array($this->children);
        }

        return !empty($this->children);
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

    public function setInActiveTrail(bool $inActiveTrail): void
    {
        $this->inActiveTrail = $inActiveTrail;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setTarget(string $target): static
    {
        $this->linkAttr = array_replace($this->linkAttr, ['target' => $target]);
        return $this;
    }

    public function addClass(string $class): void
    {
        /** @var array<string, string|int|bool> $resultArray */
        $resultArray = Arr::attachClass($this->attr, $class);
        $this->attr = $resultArray;
    }

    /**
     * @param array<string|int, string|int|bool> $attr
     */
    public function setAttributes(array $attr): void
    {
        foreach ($attr as $value) {
            Assert::oneOf(gettype($value), ['string', 'integer', 'boolean']);
        }

        $this->attr = $attr;
    }

    /**
     * @param array<string|int, string|int|bool> $attr
     */
    public function setLinkAttributes(array $attr): void
    {
        foreach ($attr as $value) {
            Assert::oneOf(gettype($value), ['string', 'integer', 'boolean']);
        }

        $this->linkAttr = $attr;
    }

    /**
     * @return array<int|string, bool|int|string>
     */
    public function getAttr(): array
    {
        return $this->attr;
    }

    /**
     * @return array<int|string, bool|int|string>
     */
    public function getLinkAttr(): array
    {
        return $this->linkAttr;
    }
}