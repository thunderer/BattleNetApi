<?php
namespace Thunder\BlizzardApi\Response\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Item;
use Thunder\BlizzardApi\ResponseInterface;

class ItemResponse implements ResponseInterface
    {
    private $item;

    public function __construct(Item $item)
        {
        $this->item = $item;
        }

    public function getItem()
        {
        return $this->item;
        }
    }
