<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class BattlePetStats
    {
    private $speciesId;
    private $breedId;
    private $petQualityId;
    private $level;
    private $health;
    private $power;
    private $speed;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $s = new self();

        $s->speciesId = $data['speciesId'];
        $s->breedId = $data['breedId'];
        $s->petQualityId = $data['petQualityId'];
        $s->level = $data['level'];
        $s->health = $data['health'];
        $s->power = $data['power'];
        $s->speed = $data['speed'];

        return $s;
        }

    public function getSpeciesId()
        {
        return $this->speciesId;
        }

    public function getBreedId()
        {
        return $this->breedId;
        }

    public function getPetQualityId()
        {
        return $this->petQualityId;
        }

    public function getLevel()
        {
        return $this->level;
        }

    public function getHealth()
        {
        return $this->health;
        }

    public function getPower()
        {
        return $this->power;
        }

    public function getSpeed()
        {
        return $this->speed;
        }
    }
