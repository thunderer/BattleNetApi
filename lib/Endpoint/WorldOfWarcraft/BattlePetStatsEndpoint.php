<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\BattlePetStats;

class BattlePetStatsEndpoint implements EndpointInterface
    {
    private $species;

    public function __construct($species)
        {
        $this->species = $species;
        }

    public function getPath()
        {
        return '/wow/battlepet/stats/'.$this->species;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return BattlePetStats::create($json);
        }
    }
