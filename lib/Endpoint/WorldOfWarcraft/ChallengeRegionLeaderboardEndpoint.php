<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;

class ChallengeRegionLeaderboardEndpoint implements EndpointInterface
    {
    public function __construct()
        {
        }

    public function getPath()
        {
        return '/wow/challenge/region';
        }

    public function getResponse($response)
        {
        }
    }
