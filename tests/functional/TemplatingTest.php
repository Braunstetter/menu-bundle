<?php

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Items\Item;
use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\DomCrawler\Crawler;


class TemplatingTest extends TestCase
{
    use TestKernelTrait;

    public function test_menu_renders_and_shows_correct_items()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', '/test/test_menu');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());
        $this->assertSame(1, $client->getCrawler()->filter('nav > div.system > a')->count());
        $this->assertSame(1, $client->getCrawler()->filter('nav > div.system > span')->count());
        $this->assertSame(2, $client->getCrawler()->filter('nav > div.system > div.section')->count());

//        dump($client->getResponse()->getContent());
        $this->assertSame(1, $client->getCrawler()->filter('nav > div.system > div.section span')->count());
        $this->assertSame(7, $client->getCrawler()->filter('nav > div.system > div.section a')->count());
    }

    public function test_route_triggers_active()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());
        $this->assertSame(4, $client->getCrawler()->filter('nav')->first()->filter('a.active')->count());
        $this->assertSame(2, $client->getCrawler()->filter('nav')->first()->filter('span.active')->count());
        $this->assertSame(5, $client->getCrawler()->filter('nav')->filter('a.active')->count());
        $this->assertSame(4, $client->getCrawler()->filter('nav')->filter('span.active')->count());
    }

    public function test_route_to_url_renders_correctly()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());

        $this->assertSame(1, $client->getCrawler()->filter('nav')->first()
            ->filter('a[target=_blank]')->reduce(function ($item) {
                /** @var Crawler $item */
                return $item->link()->getUri() === 'https://blubber.com';
            })->count());

        $this->assertSame(1, $client->getCrawler()->filter('nav')->first()
            ->filter('a[target=_parent]')->reduce(function ($item) {
                /** @var Crawler $item */
                return $item->link()->getUri() === 'https://custom-target-by-linkattr.com';
            })->count());
    }

    public function test_route_to_url_has_correct_target_attribute()
    {
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $routeToUrlItem =  $client->getCrawler()->filter('nav')->first()
            ->filter('a')->reduce(function ($item) {/** @var Crawler $item */return $item->link()->getUri() === 'https://blubber.com';});

        $this->assertSame($routeToUrlItem->link()->getNode()->getAttribute('target'), Item::TARGET_BLANK);
    }
}
