<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\functional;

use Braunstetter\MenuBundle\Items\Item;
use Braunstetter\MenuBundle\Test\trait\TestKernelTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\DomCrawler\Crawler;
use Webmozart\Assert\Assert;

class TemplatingTest extends TestCase
{
    use TestKernelTrait;

    public function testMenuRendersAndShowsCorrectItems(): void
    {
        Assert::notNull($this->kernel);
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

    public function testRouteTriggersActive(): void
    {
        Assert::notNull($this->kernel);
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());
        $this->assertSame(4, $client->getCrawler()->filter('nav')->first()->filter('a.active')->count());
        $this->assertSame(2, $client->getCrawler()->filter('nav')->first()->filter('span.active')->count());
        $this->assertSame(5, $client->getCrawler()->filter('nav')->filter('a.active')->count());
        $this->assertSame(4, $client->getCrawler()->filter('nav')->filter('span.active')->count());
    }

    public function testRouteToUrlRendersCorrectly(): void
    {
        Assert::notNull($this->kernel);
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertSame(2, $client->getCrawler()->filter('nav')->count());

        $this->assertSame(1, $client->getCrawler()->filter('nav')->first()
            ->filter('a[target=_blank]')
            ->reduce(function (Crawler $item) {
                return $item->link()
                    ->getUri() === 'https://blubber.com';
            })->count());

        $this->assertSame(1, $client->getCrawler()->filter('nav')->first()
            ->filter('a[target=_parent]')
            ->reduce(function (Crawler $item) {
                return $item->link()
                    ->getUri() === 'https://custom-target-by-linkattr.com';
            })->count());
    }

    public function testRouteToUrlHasCorrectTargetAttribute(): void
    {
        Assert::notNull($this->kernel);
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', 'test-two');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $routeToUrlItem = $client->getCrawler()
            ->filter('nav')
            ->first()
            ->filter('a')
            ->reduce(fn (Crawler $item) => $item->link()->getUri() === 'https://blubber.com');

        $this->assertSame($routeToUrlItem->link()->getNode()->getAttribute('target'), Item::TARGET_BLANK);
    }

    public function testMultipleSubnavs(): void
    {
        Assert::notNull($this->kernel);
        $client = new KernelBrowser($this->kernel);
        $client->request('GET', '/test-multiple-subnavs');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $currentLinks = $client->getCrawler()
            ->filter('.current');

        $this->assertSame(3, $currentLinks->count());

        $currentLinks->each(function (Crawler $node, int $i) {
            $expectedContents = ['API', 'Blocks', 'Permissions'];
            $text = $node->text();
            $this->assertEquals($expectedContents[$i], trim($text));
        });
    }
}
