<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class Spec
    {
    private $name;
    private $role;
    private $backgroundImage;
    private $icon;
    private $description;
    private $order;

    function __construct($name, $role, $backgroundImage, $icon, $description, $order)
        {
        $this->name = $name;
        $this->role = $role;
        $this->backgroundImage = $backgroundImage;
        $this->icon = $icon;
        $this->description = $description;
        $this->order = $order;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getRole()
        {
        return $this->role;
        }

    public function getBackgroundImage()
        {
        return $this->backgroundImage;
        }

    public function getIcon()
        {
        return $this->icon;
        }

    public function getDescription()
        {
        return $this->description;
        }

    public function getOrder()
        {
        return $this->order;
        }
    }
