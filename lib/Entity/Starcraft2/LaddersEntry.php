<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class LaddersEntry
    {
    private $ladders;
    private $characters;

    function __construct(array $ladders, array $characters)
        {
        $this->ladders = $ladders;
        $this->characters = $characters;
        }

    public function getLadders()
        {
        return $this->ladders;
        }

    public function getCharacters()
        {
        return $this->characters;
        }
    }
