<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Spell
    {
    private $id;
    private $name;
    private $icon;
    private $description;
    private $range;
    private $powerCost;
    private $castTime;
    private $cooldown;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $s = new self();

        $s->id = $data['id'];
        $s->name = $data['name'];
        $s->icon = $data['icon'];
        $s->description = $data['description'];
        $s->range = array_key_exists('range', $data) ? $data['range'] : null;
        $s->powerCost = array_key_exists('powerCost', $data) ? $data['powerCost'] : null;
        $s->castTime = $data['castTime'];
        $s->cooldown = array_key_exists('cooldown', $data) ? $data['cooldown'] : null;

        return $s;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getIcon()
        {
        return $this->icon;
        }

    public function getDescription()
        {
        return $this->description;
        }

    public function getRange()
        {
        return $this->range;
        }

    public function getPowerCost()
        {
        return $this->powerCost;
        }

    public function getCastTime()
        {
        return $this->castTime;
        }

    public function getCooldown()
        {
        return $this->cooldown;
        }
    }
