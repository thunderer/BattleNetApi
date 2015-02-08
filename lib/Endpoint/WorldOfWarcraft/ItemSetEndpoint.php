<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\ItemSet;

class ItemSetEndpoint implements EndpointInterface
    {
    private $set;

    public function __construct($set)
        {
        $this->set = $set;
        }

    public function getPath()
        {
        return '/wow/item/set/'.$this->set;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return new ItemSet($json['id'], $json['name'], $json['setBonuses'], $json['items']);
        }
    }
