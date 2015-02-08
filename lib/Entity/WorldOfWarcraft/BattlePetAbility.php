<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class BattlePetAbility
    {
    private $id;
    private $name;
    private $icon;
    private $cooldown;
    private $rounds;
    private $petTypeId;
    private $isPassive;
    private $hideHints;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $a = new self();

        $a->id = $data['id'];
        $a->name = $data['name'];
        $a->icon = $data['icon'];
        $a->cooldown = $data['cooldown'];
        $a->rounds = $data['rounds'];
        $a->petTypeId = $data['petTypeId'];
        $a->isPassive = $data['isPassive'];
        $a->hideHints = $data['hideHints'];

        return $a;
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

    public function getCooldown()
        {
        return $this->cooldown;
        }

    public function getRounds()
        {
        return $this->rounds;
        }

    public function getPetTypeId()
        {
        return $this->petTypeId;
        }

    public function isPassive()
        {
        return $this->isPassive;
        }

    public function getHideHints()
        {
        return $this->hideHints;
        }
    }
