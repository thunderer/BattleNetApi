<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Item;

class ItemEndpoint implements EndpointInterface
    {
    private $item;

    public function __construct($item)
        {
        $this->item = $item;
        }

    public function getPath()
        {
        return '/wow/item/'.$this->item;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return Item::create($json);
        }
    }
