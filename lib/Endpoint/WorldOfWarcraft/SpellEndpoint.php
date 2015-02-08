<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Spell;

class SpellEndpoint implements EndpointInterface
    {
    private $spell;

    public function __construct($spell)
        {
        $this->spell = $spell;
        }

    public function getPath()
        {
        return '/wow/spell/'.$this->spell;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return Spell::create($json);
        }
    }
