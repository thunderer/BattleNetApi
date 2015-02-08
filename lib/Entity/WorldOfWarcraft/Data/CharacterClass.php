<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class CharacterClass
    {
    private $id;
    private $mask;
    private $powerType;
    private $name;

    function __construct($id, $mask, $powerType, $name)
        {
        $this->id = $id;
        $this->mask = $mask;
        $this->powerType = $powerType;
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

    public function getPowerType()
        {
        return $this->powerType;
        }

    public function getName()
        {
        return $this->name;
        }
    }
