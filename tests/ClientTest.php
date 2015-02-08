<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\ClientFacade;
use Thunder\BlizzardApi\Entity\Account\Account;
use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Entity\Diablo3\Artisan;
use Thunder\BlizzardApi\Entity\Diablo3\Career;
use Thunder\BlizzardApi\Entity\Diablo3\Follower;
use Thunder\BlizzardApi\Entity\Diablo3\Hero;
use Thunder\BlizzardApi\Entity\Diablo3\Item as Diablo3Item;
use Thunder\BlizzardApi\Application;
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\Connector\MockConnector;
use Thunder\BlizzardApi\Entity\Starcraft2\Achievements;
use Thunder\BlizzardApi\Entity\Starcraft2\LadderEntries;
use Thunder\BlizzardApi\Entity\Starcraft2\Ladders;
use Thunder\BlizzardApi\Entity\Starcraft2\Profile;
use Thunder\BlizzardApi\Entity\Starcraft2\Rewards;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Achievement;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\BattlePetAbility;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\BattlePetSpecies;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\BattlePetStats;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Character;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\CharacterClass;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\CharacterRace;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\ClassTalents;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Guild;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Item as WorldOfWarcraftItem;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\ItemSet;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Quest;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Realm;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Recipe;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Spell;

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

            array('getDiablo3Item', array('that-long-string'), function(Diablo3Item $response) {
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
            array('getWorldOfWarcraftAchievement', array(2144), function(Achievement $response) {
                $this->assertEquals(2144, $response->getId());
                }, 'worldofwarcraft/achievement-2144.json'),
            // auction data status

            array('getWorldOfWarcraftBattlePetAbilities', array(640), function(BattlePetAbility $response) {
                $this->assertEquals(640, $response->getId());
                }, 'worldofwarcraft/battlepet/abilities-640.json'),
            array('getWorldOfWarcraftBattlePetSpecies', array(258), function(BattlePetSpecies $response) {
                $this->assertEquals(258, $response->getSpeciesId());
                $this->assertCount(6, $response->getAbilities());
                }, 'worldofwarcraft/battlepet/species-258.json'),
            array('getWorldOfWarcraftBattlePetStats', array(258, 25, 5, 4), function(BattlePetStats $response) {
                $this->assertEquals(258, $response->getSpeciesId());
                }, 'worldofwarcraft/battlepet/stats-258-25-5-4.json'),

            // challenge - realm leaderboard
            // challenge - region leaderboard

            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->assertEquals('Gaamen', $response->getName());
                $this->assertEquals(413, $response->getTotalHonorableKills());
                }, 'worldofwarcraft/character/profile-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/achievements-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/appearance-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/feed-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/guild-1.json'),
            // FIXME: No hunter pets data in fixtures!
            // character - hunter pets
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/items-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/mounts-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/pets-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/pet-slots-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/progression-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/pvp-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/quests-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/reputation-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/stats-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/talents-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/titles-1.json'),
            array('getWorldOfWarcraftCharacterProfile', array('realm', 'name', array()), function(Character $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/character/audit-1.json'),

            array('getWorldOfWarcraftItem', array(18803), function(WorldOfWarcraftItem $response) {
                $this->assertEquals(18803, $response->getId());
                $this->assertEquals(true, $response->getIsUpgradable());
                }, 'worldofwarcraft/item/item-18803.json'),
            array('getWorldOfWarcraftItemSet', array(1060), function(ItemSet $response) {
                $this->assertEquals(1060, $response->getId());
                $this->assertCount(2, $response->getBonuses());
                $this->assertCount(5, $response->getItems());
                }, 'worldofwarcraft/item/set-1060.json'),

            array('getWorldOfWarcraftGuildProfile', array('Defias Brotherhood', 'Forgotten Legacy', array()), function(Guild $response) {
                $this->assertEquals('Forgotten Legacy', $response->getName());
                $this->assertEquals('Defias Brotherhood', $response->getRealm());
                }, 'worldofwarcraft/guild/profile-1.json'),
            array('getWorldOfWarcraftGuildProfile', array('Defias Brotherhood', 'Forgotten Legacy', array()), function(Guild $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/guild/members-1.json'),
            array('getWorldOfWarcraftGuildProfile', array('Defias Brotherhood', 'Forgotten Legacy', array()), function(Guild $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/guild/achievements-1.json'),
            array('getWorldOfWarcraftGuildProfile', array('Defias Brotherhood', 'Forgotten Legacy', array()), function(Guild $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/guild/news-1.json'),
            array('getWorldOfWarcraftGuildProfile', array('Defias Brotherhood', 'Forgotten Legacy', array()), function(Guild $response) {
                $this->markTestIncomplete();
                }, 'worldofwarcraft/guild/challenge-1.json'),

            // leaderboards
            array('getWorldOfWarcraftQuest', array(13146), function(Quest $response) {
                $this->assertEquals(13146, $response->getId());
                $this->assertEquals(77, $response->getRequiredLevel());
                $this->assertEquals(80, $response->getLevel());
                }, 'worldofwarcraft/quest-13146.json'),
            array('getWorldOfWarcraftRealmStatus', array(8056), function(array $response) {
                /** @var $response Realm[] */
                $this->assertCount(246, $response);
                $realm = $response[0];
                $this->assertEquals('pvp', $realm->getType());
                $this->assertEquals('aegwynn', $realm->getSlug());
                $this->assertCount(5, $realm->getConnectedRealms());
                }, 'worldofwarcraft/realm-status.json'),
            array('getWorldOfWarcraftRecipe', array(33994), function(Recipe $response) {
                $this->assertEquals(33994, $response->getId());
                }, 'worldofwarcraft/recipe-33994.json'),
            array('getWorldOfWarcraftSpell', array(8056), function(Spell $response) {
                $this->assertEquals(8056, $response->getId());
                }, 'worldofwarcraft/spell-8056.json'),

            array('getWorldOfWarcraftDataBattlegroups', array(8056), function(array $response) {
                $this->assertCount(9, $response);
                }, 'worldofwarcraft/data/battlegroups.json'),
            array('getWorldOfWarcraftDataCharacterRaces', array(), function(array $response) {
                $this->assertCount(24, $response);
                /** @var $race CharacterRace */
                $race = $response[0];
                $this->assertEquals(1, $race->getId());
                $this->assertEquals(1, $race->getMask());
                $this->assertEquals('Human', $race->getName());
                $this->assertEquals('alliance', $race->getSide());
                }, 'worldofwarcraft/data/character-races.json'),
            array('getWorldOfWarcraftDataCharacterClasses', array(), function(array $response) {
                $this->assertCount(11, $response);
                /** @var $class CharacterClass */
                $class = $response[0];
                $this->assertEquals('focus', $class->getPowerType());
                $this->assertEquals(3, $class->getId());
                $this->assertEquals(4, $class->getMask());
                $this->assertEquals('Hunter', $class->getName());
                }, 'worldofwarcraft/data/character-classes.json'),
            array('getWorldOfWarcraftDataCharacterAchievements', array(), function(array $response) {
                $this->assertCount(62, $response);
                }, 'worldofwarcraft/data/character-achievements.json'),
            array('getWorldOfWarcraftDataGuildRewards', array(), function(array $response) {
                $this->assertCount(62, $response);
                }, 'worldofwarcraft/data/guild-rewards.json'),
            array('getWorldOfWarcraftDataGuildPerks', array(), function(array $response) {
                $this->assertCount(6, $response);
                }, 'worldofwarcraft/data/guild-perks.json'),
            array('getWorldOfWarcraftDataGuildAchievements', array(), function(array $response) {
                $this->assertCount(7, $response);
                }, 'worldofwarcraft/data/guild-achievements.json'),
            array('getWorldOfWarcraftDataItemClasses', array(), function(array $response) {
                $this->assertCount(15, $response);
                }, 'worldofwarcraft/data/item-classes.json'),
            array('getWorldOfWarcraftDataPetTypes', array(), function(array $response) {
                $this->assertCount(10, $response);
                }, 'worldofwarcraft/data/pet-types.json'),
            array('getWorldOfWarcraftDataTalents', array(), function(array $response) {
                $this->assertCount(11, $response);
                /** @var $talents ClassTalents */
                $talents = $response['warrior'];
                $this->assertEquals('warrior', $talents->getClass());
                $this->assertCount(45, $talents->getGlyphs());
                $this->assertCount(3, $talents->getSpecs());
                $this->assertCount(0, $talents->getPetSpecs());
                $this->assertCount(27, $talents->getTalents());
                }, 'worldofwarcraft/data/talents.json'),

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
