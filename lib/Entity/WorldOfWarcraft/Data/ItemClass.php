<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class ItemClass
    {
    private $class;
    private $name;
    private $subclasses = array();

    function __construct($class, $name, array $subclasses)
        {
        $this->class = $class;
        $this->name = $name;
        $this->subclasses = $subclasses;
        }

    public function getClass()
        {
        return $this->class;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getSubclasses()
        {
        return $this->subclasses;
        }
    }
