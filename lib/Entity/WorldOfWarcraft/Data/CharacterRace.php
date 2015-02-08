<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class CharacterRace
    {
    private $id;
    private $mask;
    private $side;
    private $name;

    function __construct($id, $mask, $side, $name)
        {
        $this->id = $id;
        $this->mask = $mask;
        $this->side = $side;
        $this->name = $name;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getMask()
        {
        return $this->mask;
        }

    public function getSide()
        {
        return $this->side;
        }

    public function getName()
        {
        return $this->name;
        }
    }
