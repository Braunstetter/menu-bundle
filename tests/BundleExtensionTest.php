<?php

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
    protected function getContainerExtensions(): array
    {
        return [new MenuBundleExtension()];
    }

    public function test_twig_extension_gets_loaded(): void
    {
        $this->load();
        $this->assertContainerBuilderHasService('Braunstetter\MenuBundle\Twig\Extension');
    }

    public function test_tag_gets_registered(): void
    {
        $this->load();
        $this->assertArrayHasKey(MenuInterface::class, $this->container->getAutoconfiguredInstanceof());
    }

    public function test_all_services_gets_loaded(): void
    {
        $this->load();
        $this->assertContainerBuilderHasService(AbstractMenuResolver::class);
        $this->assertContainerBuilderHasService(MenuResolver::class);
        $this->assertContainerBuilderHasService(BreadcrumbsResolver::class);
        $this->assertContainerBuilderHasService(Menu::class);
    }
}