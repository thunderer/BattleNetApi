<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class ItemSet
    {
    private $id;
    private $name;
    private $bonuses = array();
    private $items = array();

    function __construct($id, $name, array $bonuses, array $items)
        {
        $this->id = $id;
        $this->name = $name;
        $this->bonuses = $bonuses;
        $this->items = $items;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getBonuses()
        {
        return $this->bonuses;
        }

    public function getItems()
        {
        return $this->items;
        }
    }
