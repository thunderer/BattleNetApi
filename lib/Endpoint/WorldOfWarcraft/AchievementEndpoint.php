<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Achievement;

class AchievementEndpoint implements EndpointInterface
    {
    private $achievement;

    public function __construct($achievement)
        {
        $this->achievement = $achievement;
        }

    public function getPath()
        {
        return '/wow/achievement/'.$this->achievement;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return Achievement::create($json);
        }
    }
