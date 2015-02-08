<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\ItemClass;

class ItemClassesEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/item/classes';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            $subClasses = array_map(function(array $data) {
                return new ItemClass($data['subclass'], $data['name'], array());
                }, $item['subclasses']);

            return new ItemClass($item['class'], $item['name'], $subClasses);
            }, $json['classes']);
        }
    }
