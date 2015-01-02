<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\ClientFacade;
use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Request\Account\AccountIdRequest;
use Thunder\BlizzardApi\Request\Account\BattleTagRequest;
use Thunder\BlizzardApi\Request\Diablo3\ArtisanRequest;
use Thunder\BlizzardApi\Request\Diablo3\CareerRequest;
use Thunder\BlizzardApi\Request\Diablo3\FollowerRequest;
use Thunder\BlizzardApi\Request\Diablo3\HeroRequest;
use Thunder\BlizzardApi\Request\Diablo3\ItemRequest;
use Thunder\BlizzardApi\RequestInterface;
use Thunder\BlizzardApi\Response\Account\AccountIdResponse;
use Thunder\BlizzardApi\Response\Account\BattleTagResponse;
use Thunder\BlizzardApi\Application;
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\Connector\MockConnector;
use Thunder\BlizzardApi\Response\Diablo3\ArtisanResponse;
use Thunder\BlizzardApi\Response\Diablo3\CareerResponse;
use Thunder\BlizzardApi\Response\Diablo3\FollowerResponse;
use Thunder\BlizzardApi\Response\Diablo3\HeroResponse;
use Thunder\BlizzardApi\Response\Diablo3\ItemResponse;

class ClientTest extends \PHPUnit_Framework_TestCase
    {
    /**
     * @param string $method Client facade method to run
     * @param string $requestArgs Request class constructor arguments
     * @param callable $tests Tests to perform on response object
     * @param string $fixture Raw response file
     *
     * @dataProvider provideApis
     */
    public function testApis($method, $requestArgs, callable $tests, $fixture)
        {
        // $reflectionClass = new \ReflectionClass($requestClass);
        // /** @var $request RequestInterface */
        // $request = $reflectionClass->newInstanceArgs($requestArgs);
        $rawResponse = file_get_contents(__DIR__.'/fixtures/'.$fixture);
        $app = new Application('name', 'key', 'secret');
        $client = new Client($app, Client::REGION_EUROPE, 'en_GB', new MockConnector($rawResponse));
        $facade = new ClientFacade($client);
        // $tests($client->getResponse($request));
        $tests(call_user_func_array(array($facade, $method), $requestArgs));
        }

    public function provideApis()
        {
        return array(
            // Account API
            array('getAccountId', array(), function(AccountIdResponse $response) {
                $this->assertEquals(124737523, $response->getAccount()->getId());
                }, 'account/account-id.json'),
            array('getBattleTag', array(), function(BattleTagResponse $response) {
                $this->assertEquals('Thunderer#1926', $response->getBattleTag()->getBattleTag());
                }, 'account/battle-tag.json'),

            // Diablo3 API
            array('getDiablo3Career', array(new BattleTag('Thunderer#1926')), function(CareerResponse $response) {
                $career = $response->getCareer();

                $this->assertSame('Thunderer#1926', $career->getBattleTag()->getBattleTag());
                $this->assertSame(281, $career->getParagonLevel());
                $this->assertSame(4, $career->getParagonLevelHardcore());
                $this->assertSame(0, $career->getParagonLevelSeason());
                $this->assertSame(0, $career->getParagonLevelSeasonHardcore());
                $this->assertCount(8, $career->getHeroes());
                $this->assertCount(2, $career->getFallenHeroes());
                $this->assertSame(70, $career->getHighestHardcoreLevel());
                }, 'diablo3/career.json'),

            array('getDiablo3Hero', array(new BattleTag('Thunderer#1926'), 438767), function(HeroResponse $response) {
                $this->assertEquals('Thunderer', $response->getHero()->getName());
                }, 'diablo3/hero.json'),

            array('getDiablo3Item', array('that-long-string'), function(ItemResponse $response) {
                $this->assertEquals('Tal Rasha\'s Guise of Wisdom', $response->getItem()->getName());
                $this->assertCount(15, $response->getItem()->getAttributesRaw());
                }, 'diablo3/item.json'),

            array('getDiablo3Follower', array('templar'), function(FollowerResponse $response) {
                $this->assertEquals('templar', $response->getFollower()->getSlug());
                $this->assertCount(8, $response->getFollower()->getSkills()->getActive());
                $this->assertCount(0, $response->getFollower()->getSkills()->getPassive());
                }, 'diablo3/follower-templar.json'),
            array('getDiablo3Follower', array('scoundrel'), function(FollowerResponse $response) {
                $this->assertEquals('scoundrel', $response->getFollower()->getSlug());
                $this->assertCount(8, $response->getFollower()->getSkills()->getActive());
                $this->assertCount(0, $response->getFollower()->getSkills()->getPassive());
                }, 'diablo3/follower-scoundrel.json'),
            array('getDiablo3Follower', array('enchantress'), function(FollowerResponse $response) {
                $this->assertEquals('enchantress', $response->getFollower()->getSlug());
                $this->assertCount(8, $response->getFollower()->getSkills()->getActive());
                $this->assertCount(0, $response->getFollower()->getSkills()->getPassive());
                }, 'diablo3/follower-enchantress.json'),

            array('getDiablo3Artisan', array('blacksmith'), function(ArtisanResponse $response) {
                $this->assertEquals('blacksmith', $response->getArtisan()->getSlug());
                }, 'diablo3/artisan-blacksmith.json'),
            array('getDiablo3Artisan', array('jeweler'), function(ArtisanResponse $response) {
                $this->assertEquals('jeweler', $response->getArtisan()->getSlug());
                }, 'diablo3/artisan-jeweler.json'),
            array('getDiablo3Artisan', array('mystic'), function(ArtisanResponse $response) {
                $this->assertEquals('mystic', $response->getArtisan()->getSlug());
                }, 'diablo3/artisan-mystic.json'),

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
