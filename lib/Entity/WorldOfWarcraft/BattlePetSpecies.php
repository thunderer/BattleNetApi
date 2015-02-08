<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class BattlePetSpecies
    {
    private $speciesId;
    private $petTypeId;
    private $creatureId;
    private $name;
    private $canBattle;
    private $icon;
    private $description;
    private $source;
    private $abilities = array();

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $s = new self();

        $s->speciesId = $data['speciesId'];
        $s->petTypeId = $data['petTypeId'];
        $s->creatureId = $data['creatureId'];
        $s->name = $data['name'];
        $s->canBattle = $data['canBattle'];
        $s->icon = $data['icon'];
        $s->description = $data['description'];
        $s->source = $data['source'];
        $s->abilities = array_map(function(array $item) {
            return BattlePetAbility::create($item);
            }, $data['abilities']);

        return $s;
        }

    public function getSpeciesId()
        {
        return $this->speciesId;
        }

    public function getPetTypeId()
        {
        return $this->petTypeId;
        }

    public function getCreatureId()
        {
        return $this->creatureId;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getCanBattle()
        {
        return $this->canBattle;
        }

    public function getIcon()
        {
        return $this->icon;
        }

    public function getDescription()
        {
        return $this->description;
        }

    public function getSource()
        {
        return $this->source;
        }

    public function getAbilities()
        {
        return $this->abilities;
        }
    }
