<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Realm;

class RealmStatusEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/realm/status';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new Realm(
                $item['name'],
                $item['slug'],
                $item['type'],
                $item['population'],
                $item['queue'],
                $item['status'],
                $item['battlegroup'],
                $item['locale'],
                $item['timezone'],
                $item['connected_realms']);
            }, $json['realms']);
        }
    }
