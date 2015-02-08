<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;

class PvpLeaderboardsEndpoint implements EndpointInterface
    {
    private $bracket;

    public function __construct($bracket)
        {
        $this->bracket = $bracket;
        }

    public function getPath()
        {
        return '/wow/leaderboard/'.$this->bracket;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            throw new \Exception('x');
            }, $json['rows']);
        }
    }
