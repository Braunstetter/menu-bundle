<?php


namespace Braunstetter\MenuBundle\Services\Resolver;


use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Contracts\MenuItemInterface;
use Braunstetter\MenuBundle\Contracts\MenuResolverInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\String\UnicodeString;
use Webmozart\Assert\Assert;

abstract class AbstractMenuResolver implements MenuResolverInterface
{

    /**
     * @var iterable<MenuInterface>
     */
    protected iterable $entries;
    private RequestStack $requestStack;
    private UrlGeneratorInterface $generator;
    protected ?string $selectedSubnavItem = null;

    /**
     * @param iterable<MenuInterface> $entries
     */
    public function __construct(iterable $entries, RequestStack $requestStack, UrlGeneratorInterface $generator)
    {
        $this->entries = $entries;
        $this->requestStack = $requestStack;
        $this->generator = $generator;
    }

    protected function matches(MenuItemInterface $item): bool
    {
        if ($this->selectedSubnavItemMatches($item)) {
            $item->setCurrent(true);
            return true;
        }

        if (($routeName = $item->getRouteName()) === null) {
            return false;
        }

        $uri = $this->generator->generate($routeName, $item->getRouteParameters() ?: []);

        if ($uri === $this->requestStack->getCurrentRequest()?->getPathInfo()) {
            $item->setCurrent(true);
            return true;
        }

        return false;
    }

    protected function oneOfTheChildrenMatches(MenuItemInterface $item): bool
    {
        if (!empty($item->getChildren())) {

            foreach ($item->getChildren() as $subItem) {

                if ($this->matches($subItem)) {
                    $item->setInActiveTrail(true);
                    return true;
                }

                if ($this->oneOfTheChildrenMatches($subItem)) {
                    $item->setInActiveTrail(true);
                    return true;
                }

            }
        }

        return false;
    }

    private function selectedSubnavItemMatches(MenuItemInterface $item): bool
    {
        if (!isset($this->selectedSubnavItem)) {
            return false;
        }

        return $this->getHandle($item) === $this->selectedSubnavItem;
    }

    /**
     * @param array<array-key, mixed> $context
     */
    protected function setSubnavItem(array $context): void
    {
        if (array_key_exists('selectedSubnavItem', $context)) {
            $selectedSubnavItem = $context['selectedSubnavItem'];
            Assert::string($selectedSubnavItem);
            $this->selectedSubnavItem = $selectedSubnavItem;
        }
    }

    protected function getHandle(MenuInterface|MenuItemInterface $class): string
    {
        if (method_exists($class, 'getHandle')) {
            /** @var string $handle */
            $handle = $class->getHandle();
            return $handle;
        }

        if ($class instanceof MenuItemInterface && ($label = $class->getLabel()) !== null) {
            return $this->toSnakeCase($label);
        }

        $className = (new \ReflectionClass($class))->getShortName();
        return $this->toSnakeCase($className);
    }

    private function toSnakeCase(string $string): string
    {
        return (new UnicodeString($string))->snake()->toString();
    }

}