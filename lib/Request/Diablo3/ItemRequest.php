<?php
namespace Thunder\BlizzardApi\Request\Diablo3;

use Thunder\BlizzardApi\Parser\Diablo3\ItemParser;
use Thunder\BlizzardApi\RequestInterface;

class ItemRequest implements RequestInterface
    {
    private $data;

    public function __construct($data)
        {
        $this->data = $data;
        }

    public function getPath()
        {
        return '/d3/data/item/'.$this->data;
        }

    public function getParser()
        {
        return new ItemParser();
        }
    }
