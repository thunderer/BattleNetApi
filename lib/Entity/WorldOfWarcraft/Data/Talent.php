<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Spell;

class Talent
    {
    private $tier;
    private $column;
    private $spell;

    function __construct($tier, $column, Spell $spell)
        {
        $this->tier = $tier;
        $this->column = $column;
        $this->spell = $spell;
        }

    public function getTier()
        {
        return $this->tier;
        }

    public function getColumn()
        {
        return $this->column;
        }

    public function getSpell()
        {
        return $this->spell;
        }
    }
