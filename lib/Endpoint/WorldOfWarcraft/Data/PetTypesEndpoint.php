<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\PetType;

class PetTypesEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/pet/types';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new PetType($item['id'], $item['key'], $item['name'],
                $item['typeAbilityId'], $item['strongAgainstId'], $item['weakAgainstId']);
            }, $json['petTypes']);
        }
    }
