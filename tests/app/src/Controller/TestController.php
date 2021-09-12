<?php

namespace Braunstetter\MenuBundle\Test\app\src\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class TestController
{

    private Environment $twig;

    /**
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {

        $this->twig = $twig;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function index($name): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig', ['name' => $name]));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function levelOneRoute(): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig'));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function levelTwoRoute(): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig'));
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function levelThreeRoute(): Response
    {
        return (new Response())
            ->setContent($this->twig->render('test.html.twig'));
    }


}