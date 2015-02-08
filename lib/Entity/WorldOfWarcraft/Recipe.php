<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Recipe
    {
    private $id;
    private $name;
    private $profession;
    private $icon;

    function __construct($id, $name, $profession, $icon)
        {
        $this->id = $id;
        $this->name = $name;
        $this->profession = $profession;
        $this->icon = $icon;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getProfession()
        {
        return $this->profession;
        }

    public function getIcon()
        {
        return $this->icon;
        }
    }
