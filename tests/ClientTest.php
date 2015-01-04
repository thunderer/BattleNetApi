<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\ClientFacade;
use Thunder\BlizzardApi\Entity\Account\Account;
use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Entity\Diablo3\Artisan;
use Thunder\BlizzardApi\Entity\Diablo3\Career;
use Thunder\BlizzardApi\Entity\Diablo3\Follower;
use Thunder\BlizzardApi\Entity\Diablo3\Hero;
use Thunder\BlizzardApi\Entity\Diablo3\Item;
use Thunder\BlizzardApi\Application;
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\Connector\MockConnector;

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
        $rawResponse = file_get_contents(__DIR__.'/fixtures/'.$fixture);
        $app = new Application('name', 'key', 'secret');
        $client = new Client($app, Client::REGION_EUROPE, 'en_GB', new MockConnector($rawResponse));
        $facade = new ClientFacade($client);
        $tests(call_user_func_array(array($facade, $method), $requestArgs));
        }

    public function provideApis()
        {
        return array(
            // Account API
            array('getAccountId', array(), function(Account $response) {
                $this->assertEquals(124737523, $response->getId());
                }, 'account/account-id.json'),
            array('getBattleTag', array(), function(BattleTag $response) {
                $this->assertEquals('Thunderer#1926', $response->getBattleTag());
                }, 'account/battle-tag.json'),

            // Diablo3 API
            array('getDiablo3Career', array(new BattleTag('Thunderer#1926')), function(Career $response) {
                $this->assertSame('Thunderer#1926', $response->getBattleTag()->getBattleTag());
                $this->assertSame(281, $response->getParagonLevel());
                $this->assertSame(4, $response->getParagonLevelHardcore());
                $this->assertSame(0, $response->getParagonLevelSeason());
                $this->assertSame(0, $response->getParagonLevelSeasonHardcore());
                $this->assertCount(8, $response->getHeroes());
                $this->assertCount(2, $response->getFallenHeroes());
                $this->assertSame(70, $response->getHighestHardcoreLevel());
                }, 'diablo3/career.json'),

            array('getDiablo3Hero', array(new BattleTag('Thunderer#1926'), 438767), function(Hero $response) {
                $this->assertEquals('Thunderer', $response->getName());
                }, 'diablo3/hero.json'),

            array('getDiablo3Item', array('that-long-string'), function(Item $response) {
                $this->assertEquals('Tal Rasha\'s Guise of Wisdom', $response->getName());
                $this->assertCount(15, $response->getAttributesRaw());
                }, 'diablo3/item.json'),

            array('getDiablo3Follower', array('templar'), function(Follower $response) {
                $this->assertEquals('templar', $response->getSlug());
                $this->assertCount(8, $response->getSkills()->getActive());
                $this->assertCount(0, $response->getSkills()->getPassive());
                }, 'diablo3/follower-templar.json'),
            array('getDiablo3Follower', array('scoundrel'), function(Follower $response) {
                $this->assertEquals('scoundrel', $response->getSlug());
                $this->assertCount(8, $response->getSkills()->getActive());
                $this->assertCount(0, $response->getSkills()->getPassive());
                }, 'diablo3/follower-scoundrel.json'),
            array('getDiablo3Follower', array('enchantress'), function(Follower $response) {
                $this->assertEquals('enchantress', $response->getSlug());
                $this->assertCount(8, $response->getSkills()->getActive());
                $this->assertCount(0, $response->getSkills()->getPassive());
                }, 'diablo3/follower-enchantress.json'),

            array('getDiablo3Artisan', array('blacksmith'), function(Artisan $response) {
                $this->assertEquals('blacksmith', $response->getSlug());
                }, 'diablo3/artisan-blacksmith.json'),
            array('getDiablo3Artisan', array('jeweler'), function(Artisan $response) {
                $this->assertEquals('jeweler', $response->getSlug());
                }, 'diablo3/artisan-jeweler.json'),
            array('getDiablo3Artisan', array('mystic'), function(Artisan $response) {
                $this->assertEquals('mystic', $response->getSlug());
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
