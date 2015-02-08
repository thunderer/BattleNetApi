<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\CharacterClass;

class CharacterClassesEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/character/classes';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new CharacterClass($item['id'], $item['mask'], $item['powerType'], $item['name']);
            }, $json['classes']);
        }
    }
