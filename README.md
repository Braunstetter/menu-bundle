# MenuBundle

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Braunstetter/menu-bundle/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Braunstetter/menu-bundle/?branch=main)
[![Build Status](https://app.travis-ci.com/Braunstetter/menu-bundle.svg?branch=main)](https://app.travis-ci.com/Braunstetter/menu-bundle)
[![Total Downloads](https://poser.pugx.org/braunstetter/menu-bundle/downloads)](https://packagist.org/packages/braunstetter/menu-bundle)
[![License](https://poser.pugx.org/braunstetter/menu-bundle/license)](https://packagist.org/packages/braunstetter/menu-bundle)

## Overview
`braunstetter/menu-bundle` is a powerful tool designed to simplify the process of creating menus in your Symfony projects. It provides an easy and intuitive interface to create and configure various types of menus.

Benefits of using this bundle include:

* **No matcher complexities:** You can easily activate a menu item with the selectedSubnavItem function, without it needing to be a direct child.
* **No rendering system to struggle with:** You can use the render blocks provided by this bundle, or fetch the raw data and customize it as you wish.
* **Reusability:** You can reuse your menu classes in different contexts (menu, breadcrumb) across your application.
* **Expandability:** Grow your ecosystem by letting others extend your finished menus using the MenuEvent class.

## Installation

To install the MenuBundle, simply run the following command:

`composer require braunstetter/menu-bundle`

Symfony flex does all the rest for you.

## Usage

After installation, you can create a menu by creating a class implementing `MenuInterface`. This is an example of how to define a menu:

```php
<?php


namespace App\Menu;

use Braunstetter\MenuBundle\Contracts\MenuInterface;
use Braunstetter\MenuBundle\Events\MenuEvent;
use Braunstetter\MenuBundle\Factory\MenuItem;
use Traversable;

class MainMenu implements MenuInterface
{
    public function define(): Traversable
    {
        yield MenuItem::linkToRoute('System', 'route_to_my_system', [], 'images/svg/system.svg')->setChildren(function () {
            yield MenuItem::linkToUrl('Section', 'https://my-site.com', MenuItem::TARGET_BLANK, 'images/svg/thunder.svg')->setChildren(function () {
                yield MenuItem::linkToRoute('Site', 'site', [], 'images/svg/align_justify.svg');
                yield MenuItem::linkToRoute('Dashboard', 'cp_dashboard');
            });
        });
    }
}
```

### Icons

The base path for images is just the `templates` folder of your application. But since this value will just be passed
into the [Twig source function](https://twig.symfony.com/doc/2.x/functions/source.html) you can also use an alias
like `@my_bundle/images/svg/thunder.svg`.

### Twig helper

Inside your twig templates you can print the menu by using the `menu()` function and passing it the snake_cased class
name.

```html
{{ menu('main_menu') }}
```

The formatted result:

![formatted menu output](docs/images/formated_base_menu.png)

> Note: no css is shipped with this bundle. But as you can see, a ready-to-be-styled html markup gets printed once you use the menu() function.

### Types of MenuItems

```
MenuItem::linkToRoute
MenuItem::linkToUrl
```

> There are additional `MenuItem::system` and `MenuItem::section`.
> These are just convenient static methods to generate `MenuItem::linkToRoute` items with an `attr.class` set to system/section for rendering.
> `MenuItem::system` and `MenuItem::section` both can have empty routes:

```php
yield MenuItem::system('System', null, [], 'images/svg/system.svg')
```

#### LinkToRoute

```php
yield MenuItem::linkToRoute('Label', 'route-name', [], 'images/svg/align_justify.svg');
```

Parameter:
1. The shown label - you are free to translate it right here or inside your custom template.
2. Route name.
3. Route Parameters.
4. Icon (optional)

#### LinkToUrl


```php
yield MenuItem::linkToUrl('Some extern resource', 'https://my-site.com', MenuItem::TARGET_BLANK, 'images/svg/thunder.svg');
```
Parameter:
1. Label
2. Absolute url
3. Target (optional)
4. icon (optional)


> Instead of passing a target as the third argument you can change/set the target using the `$item->setTarget(MenuItem::TARGET_BLANK)` method. 
> 
>There are predefined targets to choose from set as constants inside the `'Braunstetter\MenuBundle\Items\MenuItem'` class.

#### Setting targets

As shown above - the `linkToUrl` item comes with the possibility to set the target attribute by passing it as a third argument to the static method.
This is useful because an extern/absolute Link often should be opened as a `target="_blank"` link. 
But if you want to change the target of any other link you can do this by using the `setTarget` method of any `MenuItem` implementing `MenuItemInterface`.

Here is a full example - and as you can see:

* **Dashboard** with `setTarget`
* **Shop** with target set by using the third argument of the `linkTourl` method:

```php
yield MenuItem::system('System', 'test', [], 'images/svg/system.svg')
    ->setChildren(function () {
            yield MenuItem::linkToRoute('Dashboard', 'dashboard')->setTarget(Item::TARGET_BLANK);
            yield MenuItem::linkToUrl('Shop', 'https://my-online-shop.com', Item::TARGET_BLANK, 'images/svg/thunder.svg');
    });
```

### Custom menu items

You are not limited to use the build in menu types. You can just create a class with a few static methods in order to create your own menu-item Factory. Or just pass a new `Braunstetter\MenuBundle\Items\Item` directly:

```php
yield (new Item('My label', 'images/svg/system.svg', ['linkAttr' => ['target' => Item::TARGET_BLANK]]));
```

Arguments:

1. Label
2. Icon (optional)
3. Options (optional)

If you are using the default rendering blocks just `$options['attr']`, `$options['linkAttr']` and `$options['target']` have any impact on rendering results.

> Passing the target as an option is actually the same as passing it directly to $options['linkAttr]. It is just a shortcut.

If you need to pass more options it is a good time for creating a custom MenuItem class extending `Braunstetter\MenuBundle\Items\Item`.
This way you are able to create additional properties on your class and use the `$options` to fill them inside your constructor. 

## Breadcrumbs

The same menu defined inside the previous chapter can be used as a breadcrumb menu by just using the `breadcrumbs()`
twig function.

```html
 {{ breadcrumbs('main_menu') }}
```

A ready-to-be-styled markup gets rendered - divided by a caret.svg.

The main difference between the `breadcrumbs()` and the `menu()` function is, that `breadcrumbs()` just outputs a menu
tree line, as soon as it contains some active route. Then the iteration stops and this active tree leaf gets printed.

## Render menus by your own.

Sometimes you want to have complete control over the rendering of the menu with all the information needed in place.
That's why you can use the `menu_result()` and the `breadcrumbs_result()` twig functions just the same way as described
above. The only difference is, now you have the raw data instead of markup.

```html
{% set items = menu_result('main_menu') %}

{% for item in items %}
{# do whatever you want with the data #}
{% endfor %}
```

If you decide to go this way you may find it helpful to use the blocks defined in:

[`menu_blocks.html.twig`](src/Resources/views/menu_blocks.html.twig)
and [`breadcrumb_menu_blocks.html.twig`](src/Resources/views/breadcrumb_menu_blocks.html.twig)

## Allow others to extend your menus with MenuEvents

If you build an ecosystem probably you would also like to give other users and / or bundles the option to extend or
change your menus.

This is very easy and straightforward with menu events. After you injected
the `Symfony\Contracts\EventDispatcher\EventDispatcherInterface` into the constructor of the menu class you are able to
dispatch events:

```php

$siteLinksEvent = new MenuEvent(
    yield MenuItem::linkToRoute('Site', 'site', [], 'images/svg/align_justify.svg');
    yield MenuItem::linkToRoute('Dashboard', 'cp_dashboard');
);

$this->eventDispatcher->dispatch($siteLinksEvent, 'app.main_menu');

yield from $siteLinksEvent->items;
```

Once you saved your menu inside a variable (`$siteLinks` in this case) you can create a `new MenuEvent($siteLinks)`. Now
you can dispatch events (e.g. 'app.main_menu')

The `Braunstetter\MenuBundle\Events\MenuEvent` holds the menu items **and** can prepend / append menu items. You can
create an EventSubscriber:

```php
<?php

namespace App\EventSubscriber;

use Braunstetter\MenuBundle\Events\MenuEvent;
use Braunstetter\MenuBundle\Factory\MenuItem;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Generator;

class MenuSubscriber implements EventSubscriberInterface
{

    /**
     * @param MenuEvent $event
     */
    public function onAppMainMenu(MenuEvent $event)
    {

        $event->prepend(function () {
            yield MenuItem::linkToRoute('Prepended', 'other');
        });

        $event->append(function () {
            yield MenuItem::linkToRoute('Appended', 'other');
        });

    }

    public static function getSubscribedEvents(): array
    {
        return [
            'app.main_menu' => 'onAppMainMenu',
        ];
    }
}
```

This way it's very easy to build an extensible menu system for your software ecosystem.

## Activate a menu item when it's not a direct children

Sometimes it's not just like every route is in a direct leaf of the parent, and we can just rely on these active trail.
Then you need to tell your menu system 'somehow' to activate a seemingly unrelated menu item (and to activate its active
trail).

Instead of going crazy with a custom Matcher you can just do that:

```
{% set selectedSubnavItem = 'snake_cased_item_label' %}

// you can also pass an array of items to activate multiple items at once
// selectedSubnavItem = ['snake_cased_item_label', 'another_snake_cased_item_label']

{{ menu('main_menu') }}
```

The Menu item matching this route will be active and all parents will be inside the active trail.

> Note: `selectedSubnavItem` has to be inside the global twig scope - therefore define it in between your blocks or pass it as a variable from inside your controller.

> The value of the `selectedSubnavItem` has to be equal to the handle of the MenuItem (snake cased label). 
