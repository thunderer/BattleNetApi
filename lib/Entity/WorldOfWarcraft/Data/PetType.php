<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class PetType
    {
    private $id;
    private $key;
    private $name;
    private $typeAbilityId;
    private $strongAgainstId;
    private $weakAgainstId;

    function __construct($id, $key, $name, $typeAbilityId, $strongAgainstId, $weakAgainstId)
        {
        $this->id = $id;
        $this->key = $key;
        $this->name = $name;
        $this->typeAbilityId = $typeAbilityId;
        $this->strongAgainstId = $strongAgainstId;
        $this->weakAgainstId = $weakAgainstId;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getKey()
        {
        return $this->key;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getTypeAbilityId()
        {
        return $this->typeAbilityId;
        }

    public function getStrongAgainstId()
        {
        return $this->strongAgainstId;
        }

    public function getWeakAgainstId()
        {
        return $this->weakAgainstId;
        }
    }
