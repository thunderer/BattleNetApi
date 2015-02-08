<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;

class ChallengeRealmLeaderboardEndpoint implements EndpointInterface
    {
    private $realm;

    public function __construct($realm)
        {
        $this->realm = $realm;
        }

    public function getPath()
        {
        return '/wow/challenge/'.$this->realm;
        }

    public function getResponse($response)
        {
        }
    }
