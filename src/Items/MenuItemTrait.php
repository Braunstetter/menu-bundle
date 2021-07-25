<?php


namespace Braunstetter\MenuBundle\Items;


use Symfony\Component\String\UnicodeString;
use Traversable;
use function count;

trait MenuItemTrait
{
    private string $type;
    private int $index;
    private int $subIndex;
    private string $label;
    private ?string $icon;
    private string $cssClass;
    private ?string $permission;
    private ?string $routeName;
    private ?array $routeParameters;
    private ?string $linkUrl;
    private string $linkRel;
    private string $linkTarget;
    private array $translationParameters;
    private array|Traversable $children;
    private bool $current;
    private bool $inActiveTrail;
    public string $handle;

    public function __construct(string $label, string $routeName, array $routeParameters, ?string $icon)
    {
        $this->cssClass = '';
        $this->translationParameters = [];
        $this->linkRel = '';
        $this->linkTarget = '_self';
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

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function setIndex(int $index): void
    {
        $this->index = $index;
    }

    public function getSubIndex(): int
    {
        return $this->subIndex;
    }

    public function setSubIndex(int $subIndex): void
    {
        $this->subIndex = $subIndex;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): void
    {
        $this->icon = $icon;
    }

    public function getLinkUrl(): string
    {
        return $this->linkUrl;
    }

    public function setLinkUrl(?string $linkUrl): void
    {
        $this->linkUrl = $linkUrl;
    }

    public function getRouteName(): ?string
    {
        return $this->routeName;
    }

    public function setRouteName(?string $routeName): void
    {
        $this->routeName = $routeName;
    }

    public function getRouteParameters(): ?array
    {
        return $this->routeParameters;
    }

    public function setRouteParameter(string $parameterName, $parameterValue): void
    {
        $this->routeParameters[$parameterName] = $parameterValue;
    }

    public function setRouteParameters(?array $routeParameters): void
    {
        $this->routeParameters = $routeParameters;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): void
    {
        $this->permission = $permission;
    }

    public function getCssClass(): string
    {
        return $this->cssClass;
    }

    public function setCssClass(string $cssClass): void
    {
        $this->cssClass = $cssClass;
    }

    public function getLinkRel(): string
    {
        return $this->linkRel;
    }

    public function setLinkRel(string $linkRel): void
    {
        $this->linkRel = $linkRel;
    }

    public function getLinkTarget(): string
    {
        return $this->linkTarget;
    }

    public function setLinkTarget(string $linkTarget): void
    {
        $this->linkTarget = $linkTarget;
    }

    public function getTranslationParameters(): array
    {
        return $this->translationParameters;
    }

    public function setTranslationParameters(array $translationParameters): void
    {
        $this->translationParameters = $translationParameters;
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

    /**
     * @param string $handle
     * @return MenuItemTrait
     */
    public function setHandle(string $handle): static
    {
        $this->handle = $handle;
        return $this;
    }

}