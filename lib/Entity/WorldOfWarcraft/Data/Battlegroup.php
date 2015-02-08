<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class Battlegroup
    {
    private $name;
    private $slug;

    function __construct($name, $slug)
        {
        $this->name = $name;
        $this->slug = $slug;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getSlug()
        {
        return $this->slug;
        }
    }
