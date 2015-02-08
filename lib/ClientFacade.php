<?php
namespace Thunder\BlizzardApi;

use Thunder\BlizzardApi\Endpoint\Starcraft2\AchievementsEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\LadderEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\LaddersEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\MatchHistoryEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\ProfileEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\RewardsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\AchievementEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\AuctionDataEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\BattlePetAbilitiesEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\BattlePetSpeciesEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\BattlePetStatsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\ChallengeRealmLeaderboardEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\ChallengeRegionLeaderboardEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\CharacterProfileEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\BattlegroupsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\CharacterAchievementsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\CharacterClassesEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\CharacterRacesEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\GuildAchievementsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\GuildPerksEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\GuildRewardsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\ItemClassesEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\PetTypesEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data\TalentsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\GuildProfileEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\ItemEndpoint as WorldOfWarcraftItemEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\ItemSetEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\PvpLeaderboardsEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\QuestEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\RealmStatusEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\RecipeEndpoint;
use Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\SpellEndpoint;
use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Endpoint\Account\AccountIdEndpoint;
use Thunder\BlizzardApi\Endpoint\Account\BattleTagEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\ArtisanEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\CareerEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\FollowerEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\HeroEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\ItemEndpoint as Diablo3ItemEndpoint;

class ClientFacade
    {
    /** @var Client */
    private $client;

    function __construct(Client $client)
        {
        $this->client = $client;
        }

    private function getResponse(EndpointInterface $request)
        {
        return $this->client->getResponse($request);
        }

    /* --- ACCOUNT API --- */

    public function getAccountId()
        {
        return $this->getResponse(new AccountIdEndpoint());
        }

    public function getBattleTag()
        {
        return $this->getResponse(new BattleTagEndpoint());
        }

    /* --- DIABLO 3 API --- */

    public function getDiablo3Career(BattleTag $battleTag)
        {
        return $this->getResponse(new CareerEndpoint($battleTag));
        }

    public function getDiablo3Hero(BattleTag $battleTag, $heroId)
        {
        return $this->getResponse(new HeroEndpoint($battleTag, $heroId));
        }

    public function getDiablo3Item($itemId)
        {
        return $this->getResponse(new Diablo3ItemEndpoint($itemId));
        }

    public function getDiablo3Follower($follower)
        {
        return $this->getResponse(new FollowerEndpoint($follower));
        }

    public function getDiablo3Artisan($artisan)
        {
        return $this->getResponse(new ArtisanEndpoint($artisan));
        }

    /* --- STARCRAFT 2 API --- */

    public function getStarcraft2Profile($id, $region, $name)
        {
        return $this->getResponse(new ProfileEndpoint($id, $region, $name));
        }

    public function getStarcraft2Ladders($id, $region, $name)
        {
        return $this->getResponse(new LaddersEndpoint($id, $region, $name));
        }

    public function getStarcraft2MatchHistory($id, $region, $name)
        {
        return $this->getResponse(new MatchHistoryEndpoint($id, $region, $name));
        }

    public function getStarcraft2Ladder($id)
        {
        return $this->getResponse(new LadderEndpoint($id));
        }

    public function getStarcraft2Achievements()
        {
        return $this->getResponse(new AchievementsEndpoint());
        }

    public function getStarcraft2Rewards()
        {
        return $this->getResponse(new RewardsEndpoint());
        }

    /* --- WORLD OF WARCRAFT API --- */

    public function getWorldOfWarcraftAchievement($achievement)
        {
        return $this->getResponse(new AchievementEndpoint($achievement));
        }

    public function getWorldOfWarcraftAuctionDataStatus($realm)
        {
        return $this->getResponse(new AuctionDataEndpoint($realm));
        }

    public function getWorldOfWarcraftBattlePetAbilities($ability)
        {
        return $this->getResponse(new BattlePetAbilitiesEndpoint($ability));
        }

    public function getWorldOfWarcraftBattlePetSpecies($species)
        {
        return $this->getResponse(new BattlePetSpeciesEndpoint($species));
        }

    public function getWorldOfWarcraftBattlePetStats($species)
        {
        return $this->getResponse(new BattlePetStatsEndpoint($species));
        }

    public function getWorldOfWarcraftChallengeRealmLeaderboard($realm)
        {
        return $this->getResponse(new ChallengeRealmLeaderboardEndpoint($realm));
        }

    public function getWorldOfWarcraftChallengeRegionLeaderboard()
        {
        return $this->getResponse(new ChallengeRegionLeaderboardEndpoint());
        }

    public function getWorldOfWarcraftCharacterProfile($realm, $name, array $fields)
        {
        return $this->getResponse(new CharacterProfileEndpoint($realm, $name, $fields));
        }

    public function getWorldOfWarcraftItem($item)
        {
        return $this->getResponse(new WorldOfWarcraftItemEndpoint($item));
        }

    public function getWorldOfWarcraftItemSet($set)
        {
        return $this->getResponse(new ItemSetEndpoint($set));
        }

    public function getWorldOfWarcraftGuildProfile($realm, $guild, array $fields)
        {
        return $this->getResponse(new GuildProfileEndpoint($realm, $guild, $fields));
        }

    public function getWorldOfWarcraftPvpLeaderboards($bracket)
        {
        return $this->getResponse(new PvpLeaderboardsEndpoint($bracket));
        }

    public function getWorldOfWarcraftQuest($quest)
        {
        return $this->getResponse(new QuestEndpoint($quest));
        }

    public function getWorldOfWarcraftRealmStatus()
        {
        return $this->getResponse(new RealmStatusEndpoint());
        }

    public function getWorldOfWarcraftSpell($spell)
        {
        return $this->getResponse(new SpellEndpoint($spell));
        }

    public function getWorldOfWarcraftRecipe($recipe)
        {
        return $this->getResponse(new RecipeEndpoint($recipe));
        }

    public function getWorldOfWarcraftDataBattlegroups()
        {
        return $this->getResponse(new BattlegroupsEndpoint());
        }

    public function getWorldOfWarcraftDataCharacterRaces()
        {
        return $this->getResponse(new CharacterRacesEndpoint());
        }

    public function getWorldOfWarcraftDataCharacterClasses()
        {
        return $this->getResponse(new CharacterClassesEndpoint());
        }

    public function getWorldOfWarcraftDataCharacterAchievements()
        {
        return $this->getResponse(new CharacterAchievementsEndpoint());
        }

    public function getWorldOfWarcraftDataGuildRewards()
        {
        return $this->getResponse(new GuildRewardsEndpoint());
        }

    public function getWorldOfWarcraftDataGuildPerks()
        {
        return $this->getResponse(new GuildPerksEndpoint());
        }

    public function getWorldOfWarcraftDataGuildAchievements()
        {
        return $this->getResponse(new GuildAchievementsEndpoint());
        }

    public function getWorldOfWarcraftDataItemClasses()
        {
        return $this->getResponse(new ItemClassesEndpoint());
        }

    public function getWorldOfWarcraftDataTalents()
        {
        return $this->getResponse(new TalentsEndpoint());
        }

    public function getWorldOfWarcraftDataPetTypes()
        {
        return $this->getResponse(new PetTypesEndpoint());
        }
    }
