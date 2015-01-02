<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Request\Account\AccountIdRequest;
use Thunder\BlizzardApi\Request\Account\BattleTagRequest;
use Thunder\BlizzardApi\Request\Diablo3\CareerRequest;
use Thunder\BlizzardApi\Request\Diablo3\HeroRequest;
use Thunder\BlizzardApi\Request\Diablo3\ItemRequest;
use Thunder\BlizzardApi\RequestInterface;
use Thunder\BlizzardApi\Response\Account\AccountIdResponse;
use Thunder\BlizzardApi\Response\Account\BattleTagResponse;
use Thunder\BlizzardApi\Application;
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\Connector\MockConnector;
use Thunder\BlizzardApi\Response\Diablo3\CareerResponse;
use Thunder\BlizzardApi\Response\Diablo3\HeroResponse;
use Thunder\BlizzardApi\Response\Diablo3\ItemResponse;

class ClientTest extends \PHPUnit_Framework_TestCase
    {
    /**
     * @param string $requestClass Request class to instantiate
     * @param string $requestArgs Request class constructor arguments
     * @param callable $tests Tests to perform on response object
     * @param string $fixture Raw response file
     *
     * @dataProvider provideApis
     */
    public function testApis($requestClass, $requestArgs, callable $tests, $fixture)
        {
        $reflectionClass = new \ReflectionClass($requestClass);
        /** @var $request RequestInterface */
        $request = $reflectionClass->newInstanceArgs($requestArgs);
        $rawResponse = file_get_contents(__DIR__.'/fixtures/'.$fixture);
        $app = new Application('name', 'key', 'secret');
        $client = new Client($app, Client::REGION_EUROPE, 'en_GB', new MockConnector($rawResponse));
        $tests($client->getResponse($request));
        }

    public function provideApis()
        {
        return array(
            // Account API
            array(AccountIdRequest::class, array(), function(AccountIdResponse $response) {
                $this->assertEquals(124737523, $response->getAccount()->getId());
                }, 'account/account-id.json'),
            array(BattleTagRequest::class, array(), function(BattleTagResponse $response) {
                $this->assertEquals('Thunderer#1926', $response->getBattleTag()->getBattleTag());
                }, 'account/battle-tag.json'),

            // Diablo3 API
            array(CareerRequest::class, array(new BattleTag('Thunderer#1926')), function(CareerResponse $response) {
                $this->assertEquals('Thunderer#1926', $response->getCareer()->getBattleTag()->getBattleTag());
                $this->assertCount(8, $response->getCareer()->getHeroes());
                }, 'diablo3/career.json'),
            array(HeroRequest::class, array(new BattleTag('Thunderer#1926'), 438767), function(HeroResponse $response) {
                $this->assertEquals('Thunderer', $response->getHero()->getName());
                }, 'diablo3/hero.json'),
            array(ItemRequest::class, array('that-long-string'), function(ItemResponse $response) {
                $this->assertEquals('Tal Rasha\'s Guise of Wisdom', $response->getItem()->getName());
                $this->assertCount(15, $response->getItem()->getAttributesRaw());
                }, 'diablo3/item.json'),
            // artisan
            // follower

            // StarCraft2 API
            // profile
            // ladders
            // match history
            // ladder
            // achievements
            // rewards

            // World Of Warcraft API
            // achievement
            // auction data status
            // battlepet - abilities
            // battlepet - species
            // battlepet - stats
            // challenge - realm leaderboard
            // challenge - region leaderboard
            // character - profile
            // character - achievements
            // character - appearance
            // character - feed
            // character - guild
            // character - hunter pets
            // character - items
            // character - mounts
            // character - pets
            // character - pet slots
            // character - progression
            // character - pvp
            // character - quests
            // character - reputation
            // character - stats
            // character - talents
            // character - titles
            // character - audit
            // item - item
            // item - item set
            // guild - profile
            // guild - members
            // guild - achievements
            // guild - news
            // guild - challenge
            // leaderboards
            // quest
            // realm status
            // recipe
            // spell
            // data - battlegroups
            // data - character races
            // data - character classes
            // data - character achievements
            // data - guild rewards
            // data - guild perks
            // data - guild achievements
            // data - item classes
            // data - talents
            // data - pet types

            // Community OAuth Profile
            // starcraft2
            // world of warcraft
            );
        }

    public function testInvalidRegion()
        {
        $this->setExpectedException('InvalidArgumentException');
        new Client(new Application('name', 'key', 'secret'), 'invalid', 'invalid', new MockConnector(''));
        }

    public function testInvalidLocale()
        {
        $this->setExpectedException('InvalidArgumentException');
        new Client(new Application('name', 'key', 'secret'), Client::REGION_EUROPE, 'invalid', new MockConnector(''));
        }
    }
