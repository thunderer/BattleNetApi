<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\Battlegroup;

class BattlegroupsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/battlegroups/';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new Battlegroup($item['name'], $item['slug']);
            }, $json['battlegroups']);
        }
    }
