<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\app\src\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TestController
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function index(string $name): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig', [
                'name' => $name,
            ]));
    }

    public function levelOneRoute(): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig'));
    }

    public function levelTwoRoute(): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig'));
    }

    public function levelThreeRoute(): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig'));
    }
}
