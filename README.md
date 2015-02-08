# Battle.net API PHP Client

[Blizzard](http://blizzard.com) is a game development company. There are many well-known titles in their portfolio, the most recognized being [Diablo](http://battle.net/d3), [Starcraft](http://battle.net/sc2), and [World of Warcraft](http://battle.net/wow). All their products are gathered on a platform called [Battle.net](http://battle.net). In 2014 they opened public access to its [API](https://dev.battle.net/) through which players can access game data. This is a PHP client library implementing easy access to that API.

Note: There are quite a few libraries that in general provide the same functionality, but in majority of cases they offer only one game and no more than raw parsed data from API endpoints. This library maps all responses to entities which represent certain game elements so instead of raw arrays you get well-defined objects with helper methods and other utilities for interaction with returned data.

# Requirements

Only PHP 5.3 or greater. Namespaces are magic, you know.

# Installation

You can find this library on Packagist under alias `thunderer/battlenet-api`. To install it you can either run `composer require` with provided alias or place into your `composer.json`:

```json
"require": {
    "thunderer/battlenet-api": "dev-master"
}
```

and then run `composer install` or `composer update`.

# Usage

Create `ClientFacade` class instance by providing necessary parameters and you're ready to use its dead simple public API:

```php
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\ClientFacade;
use Thunder\BlizzardApi\Connector\CurlConnector;

$application = new Application('name', 'key', 'secret'); // you get these when you create a Mashery application
$client = new ClientFacade(new Client($application, 'region', 'locale', new CurlConnector()));

$hero = $client->getDiablo3Hero('Thunderer-1926');
assert('Thunderer#1926' === $hero->getBattleTag()->getBattleTag(), 'report a bug if you see this message')
```

# Contributing

Any contribution is more than welcome, please fork this repository and submit a Pull Request when you're ready.

# License

You'll find it in a LICENSE file in a root directory of this repository. It's MIT, no worries. All Blizzard things are of course Blizzard's so please also read their [policy](https://dev.battle.net/policy).
