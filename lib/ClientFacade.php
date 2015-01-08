<?php
namespace Thunder\BlizzardApi;

use Thunder\BlizzardApi\Endpoint\Starcraft2\AchievementsEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\LadderEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\LaddersEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\MatchHistoryEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\ProfileEndpoint;
use Thunder\BlizzardApi\Endpoint\Starcraft2\RewardsEndpoint;
use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Endpoint\Account\AccountIdEndpoint;
use Thunder\BlizzardApi\Endpoint\Account\BattleTagEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\ArtisanEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\CareerEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\FollowerEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\HeroEndpoint;
use Thunder\BlizzardApi\Endpoint\Diablo3\ItemEndpoint;

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
        return $this->getResponse(new ItemEndpoint($itemId));
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
    }
