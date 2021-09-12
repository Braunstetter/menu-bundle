<?php

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class TemplatingTest extends TestCase
{
    use TestKernelTrait;

    public function test_menu_renders_and_shows_correct_items()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', '/test/test_menu');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());
        $this->assertSame(2, $client->getCrawler()->filter('nav > div.system > a')->count());
        $this->assertSame(2, $client->getCrawler()->filter('nav > div.system > div.section div.section')->count());
        $this->assertSame(4, $client->getCrawler()->filter('nav > div.system > div.section > div.section a')->count());
    }

    public function test_route_triggers_active()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());
        $this->assertSame(6, $client->getCrawler()->filter('nav')->first()->filter('a.active')->count());
        $this->assertSame(9, $client->getCrawler()->filter('nav')->filter('a.active')->count());

    }
}
