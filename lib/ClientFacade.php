<?php
namespace Thunder\BlizzardApi;

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

    private function getResponse(RequestInterface $request)
        {
        return $this->client->getResponse($request);
        }

    public function getAccountId()
        {
        return $this->getResponse(new AccountIdEndpoint());
        }

    public function getBattleTag()
        {
        return $this->getResponse(new BattleTagEndpoint());
        }

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
    }
