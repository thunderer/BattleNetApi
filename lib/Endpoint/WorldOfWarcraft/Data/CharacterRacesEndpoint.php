<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\CharacterRace;

class CharacterRacesEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/character/races';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new CharacterRace($item['id'], $item['mask'], $item['side'], $item['name']);
            }, $json['races']);
        }
    }
