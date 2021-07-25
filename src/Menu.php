<?php


namespace Braunstetter\MenuBundle;


use ReflectionClass;
use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Symfony\Component\String\UnicodeString;
use Traversable;

abstract class Menu implements MenuInterface
{
    abstract public function define(): Traversable;

    public string $handle;

    public function __construct()
    {
        $className = (new ReflectionClass($this))->getShortName();
        $this->handle = (new UnicodeString($className))->snake()->toString();
    }

    public function __invoke(): array
    {
        return iterator_to_array($this->define(), false);
    }

}