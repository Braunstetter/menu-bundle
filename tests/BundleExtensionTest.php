<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\DependencyInjection\MenuBundleExtension;
use Braunstetter\MenuBundle\Services\Menu;
use Braunstetter\MenuBundle\Services\Resolver\AbstractMenuResolver;
use Braunstetter\MenuBundle\Services\Resolver\BreadcrumbsResolver;
use Braunstetter\MenuBundle\Services\Resolver\MenuResolver;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

class BundleExtensionTest extends AbstractExtensionTestCase
{
    public function testTwigExtensionGetsLoaded(): void
    {
        $this->load();
        $this->assertContainerBuilderHasService('Braunstetter\MenuBundle\Twig\Extension');
    }

    public function testTagGetsRegistered(): void
    {
        $this->load();
        $this->assertArrayHasKey(MenuInterface::class, $this->container->getAutoconfiguredInstanceof());
    }

    public function testAllServicesGetsLoaded(): void
    {
        $this->load();
        $this->assertContainerBuilderHasService(AbstractMenuResolver::class);
        $this->assertContainerBuilderHasService(MenuResolver::class);
        $this->assertContainerBuilderHasService(BreadcrumbsResolver::class);
        $this->assertContainerBuilderHasService(Menu::class);
    }

    protected function getContainerExtensions(): array
    {
        return [new MenuBundleExtension()];
    }
}
