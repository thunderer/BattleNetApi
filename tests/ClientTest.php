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
use Thunder\BlizzardApi\Entity\Starcraft2\Achievements;
use Thunder\BlizzardApi\Entity\Starcraft2\LadderEntries;
use Thunder\BlizzardApi\Entity\Starcraft2\Ladders;
use Thunder\BlizzardApi\Entity\Starcraft2\Profile;
use Thunder\BlizzardApi\Entity\Starcraft2\Rewards;

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
            array('getStarcraft2Profile', array('id', 'region', 'name'), function(Profile $response) {
                $this->assertEquals(777777, $response->getId());
                $this->assertEquals('XXXXXXXXX', $response->getDisplayName());
                $this->assertCount(16, $response->getAchievements());
                $this->assertCount(6, $response->getAchievementsPointsByCategory());
                $this->assertCount(0, $response->getEarnedRewards());
                $this->assertCount(4, $response->getSelectedRewards());
                $this->assertEquals(155, $response->getTotalAchievementsPoints());
                }, 'starcraft2/profile-1.json'),
            array('getStarcraft2Profile', array('id', 'region', 'name'), function(Profile $response) {
                $this->assertEquals(888888, $response->getId());
                $this->assertEquals('PPPPPPP', $response->getDisplayName());
                $this->assertCount(31, $response->getAchievements());
                $this->assertCount(6, $response->getAchievementsPointsByCategory());
                $this->assertCount(19, $response->getEarnedRewards());
                $this->assertCount(4, $response->getSelectedRewards());
                $this->assertEquals(355, $response->getTotalAchievementsPoints());
                }, 'starcraft2/profile-2.json'),
            array('getStarcraft2Profile', array('id', 'region', 'name'), function(Profile $response) {
                $this->assertEquals(1111111, $response->getId());
                $this->assertEquals('YYYYYYY', $response->getDisplayName());
                $this->assertCount(184, $response->getAchievements());
                $this->assertCount(6, $response->getAchievementsPointsByCategory());
                $this->assertCount(121, $response->getEarnedRewards());
                $this->assertCount(8, $response->getSelectedRewards());
                $this->assertEquals(2175, $response->getTotalAchievementsPoints());
                }, 'starcraft2/profile-3.json'),

            array('getStarcraft2Ladders', array('id', 'region', 'name'), function(Ladders $response) {
                $this->assertCount(5, $response->getCurrentSeason());
                $this->assertCount(8, $response->getPreviousSeason());
                $this->assertCount(1, $response->getShowcasePlacement());
                }, 'starcraft2/ladders.json'),

            array('getStarcraft2MatchHistory', array('id', 'region', 'name'), function(array $response) {
                $this->assertCount(20, $response);
                }, 'starcraft2/matches-1.json'),
            array('getStarcraft2MatchHistory', array('id', 'region', 'name'), function(array $response) {
                $this->assertCount(25, $response);
                }, 'starcraft2/matches-2.json'),

            array('getStarcraft2Ladder', array('id'), function(LadderEntries $response) {
                $this->assertCount(100, $response->getEntries());
                }, 'starcraft2/ladder.json'),

            array('getStarcraft2Achievements', array(), function(Achievements $response) {
                $this->assertCount(735, $response->getAchievements());
                $this->assertCount(7, $response->getCategories());
                }, 'starcraft2/achievements.json'),
            array('getStarcraft2Rewards', array(), function(Rewards $response) {
                $this->assertCount(194, $response->getPortraits());
                $this->assertCount(66, $response->getTerranDecals());
                $this->assertCount(66, $response->getZergDecals());
                $this->assertCount(66, $response->getProtossDecals());
                $this->assertCount(16, $response->getSkins());
                $this->assertCount(12, $response->getAnimations());
                }, 'starcraft2/rewards.json'),

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
