<?php


namespace Braunstetter\MenuBundle\Contracts;


interface MenuResolverInterface
{
    public function get($name, $context);
}