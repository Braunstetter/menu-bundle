<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/test-one' => [[['_route' => 'test_one', '_controller' => 'Braunstetter\\MenuBundle\\Test\\app\\src\\Controller\\TestController::levelOneRoute'], null, null, null, false, false, null]],
        '/test-two' => [[['_route' => 'test_two', '_controller' => 'Braunstetter\\MenuBundle\\Test\\app\\src\\Controller\\TestController::levelTwoRoute'], null, null, null, false, false, null]],
        '/test-three' => [[['_route' => 'test_three', '_controller' => 'Braunstetter\\MenuBundle\\Test\\app\\src\\Controller\\TestController::levelThreeRoute'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/test/([^/]++)(*:21)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        21 => [
            [['_route' => 'test', '_controller' => 'Braunstetter\\MenuBundle\\Test\\app\\src\\Controller\\TestController::index'], ['name'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
