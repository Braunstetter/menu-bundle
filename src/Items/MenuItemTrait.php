<?php


namespace Braunstetter\MenuBundle\Items;

use Braunstetter\Helper\Arr;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Symfony\Component\String\UnicodeString;
use Traversable;
use Webmozart\Assert\Assert;

trait MenuItemTrait
{
    private string $type;
    private string $label;
    private ?string $icon;
    private ?string $routeName;

    /**
     * @var array<string, int|string>
     */
    private ?array $routeParameters;

    /**
     * @var iterable<MenuItemInterface>
     */
    private iterable $children;
    private bool $current;
    private bool $inActiveTrail;
    public string $handle;
    public string $url;

    /**
     * @var array<int|string,string|int|bool>
     */
    public array $attr;

    /**
     * @var array<int|string,string|int|bool>
     */
    public array $linkAttr;

    /**
     * @param array<string, mixed>|null $options
     */
    public function __construct(string $label, ?string $icon, ?array $options = [])
    {
        $this->children = [];
        $this->current = false;
        $this->inActiveTrail = false;

        $this->setLabel($label);
        $this->setIcon($icon);

        $attr = $options['attr'] ?? [];
        Assert::isArray($attr, 'The attr option must be an array, %s given.');
        $this->setAttributes($attr);

        $linkAttr = $options['linkAttr'] ?? [];
        Assert::isArray($linkAttr, 'The linkAttr option must be an array, %s given.');
        $this->setLinkAttributes($linkAttr);

        if (isset($options['target'])) {
            $target = $options['target'];
            Assert::string($target, 'The target option must be a string, %s given.');
            $this->setTarget($target);
        }

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

    /**
     * @return string
     */
    public function getHandle(): string
    {
        return $this->handle;
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
        if (!is_array($this->children)) {
            $this->children = iterator_to_array($this->children, false);
        }

        return $this->children;
    }

    public function setChildren(callable $children): static
    {
        $result = call_user_func($children);
        Assert::isIterable($result);
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

    public function getUrl(): string
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
        $this->attr = Arr::attachClass($this->attr, $class);
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

    public function getAttr(): array
    {
        return $this->attr;
    }

    public function getLinkAttr(): array
    {
        return $this->linkAttr;
    }
}