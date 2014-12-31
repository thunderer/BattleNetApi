<?php
namespace Thunder\BlizzardApi\Diablo3\Entity;

class Item
    {
    private $id;
    private $name;
    private $icon;
    private $color;
    private $tooltip;
    private $level;
    private $requiredLevel;
    private $affixes;
    private $affixesMax;
    private $isAccountBound;
    private $isTwoHanded;
    private $typeId;
    private $typeName;

    private $isSet;
    private $set;

    private $isSeasonal;
    private $season;

    public function __construct($id, $name, $icon, $color, $tooltip, $level,
                                $requiredLevel)
        {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->color = $color;
        $this->tooltip = $tooltip;
        $this->level = $level;
        $this->requiredLevel = $requiredLevel;
        }
    }
