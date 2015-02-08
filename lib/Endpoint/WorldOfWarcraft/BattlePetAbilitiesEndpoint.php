<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\BattlePetAbility;

class BattlePetAbilitiesEndpoint implements EndpointInterface
    {
    private $ability;

    public function __construct($ability)
        {
        $this->ability = $ability;
        }

    public function getPath()
        {
        return '/wow/battlepet/ability/'.$this->ability;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return BattlePetAbility::create($json);
        }
    }
