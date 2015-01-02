<?php
namespace Thunder\BlizzardApi;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Request\Account\AccountIdRequest;
use Thunder\BlizzardApi\Request\Account\BattleTagRequest;
use Thunder\BlizzardApi\Request\Diablo3\ArtisanRequest;
use Thunder\BlizzardApi\Request\Diablo3\CareerRequest;
use Thunder\BlizzardApi\Request\Diablo3\FollowerRequest;
use Thunder\BlizzardApi\Request\Diablo3\HeroRequest;
use Thunder\BlizzardApi\Request\Diablo3\ItemRequest;

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
        return $this->getResponse(new AccountIdRequest());
        }

    public function getBattleTag()
        {
        return $this->getResponse(new BattleTagRequest());
        }

    public function getDiablo3Career(BattleTag $battleTag)
        {
        return $this->getResponse(new CareerRequest($battleTag));
        }

    public function getDiablo3Hero(BattleTag $battleTag, $heroId)
        {
        return $this->getResponse(new HeroRequest($battleTag, $heroId));
        }

    public function getDiablo3Item($itemId)
        {
        return $this->getResponse(new ItemRequest($itemId));
        }

    public function getDiablo3Follower($follower)
        {
        return $this->getResponse(new FollowerRequest($follower));
        }

    public function getDiablo3Artisan($artisan)
        {
        return $this->getResponse(new ArtisanRequest($artisan));
        }
    }
