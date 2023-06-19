<?php

namespace Braunstetter\MenuBundle\Test;

use Braunstetter\MenuBundle\DependencyInjection\MenuBundleExtension;
use Braunstetter\MenuBundle\MenuBundle;
use Nyholm\BundleTest\AppKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpKernel\KernelInterface;

class BundleTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return AppKernel::class;
    }

    /**
     * @param array<array-key, mixed> $options
     */
    protected static function createKernel(array $options = []): KernelInterface
    {
        /**
         * @var AppKernel $kernel
         */
        $kernel = parent::createKernel($options);
        $kernel->addBundle(MenuBundle::class);

        return $kernel;
    }

    public function testInitBundle(): void
    {
        self::bootKernel();
        $bundle = self::$kernel->getBundle('MenuBundle');
        $this->assertInstanceOf(MenuBundle::class, $bundle);
        $this->assertInstanceOf(MenuBundleExtension::class, $bundle->getContainerExtension());
    }

}