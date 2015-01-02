<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Item
    {
    private $id;
    private $name;
    private $icon;
    private $color;
    private $tooltip;
    private $level;
    private $requiredLevel;
    private $bonusAffixes;
    private $bonusAffixesMax;
    private $isAccountBound;
    private $isTwoHanded;
    private $typeId;
    private $typeName;
    private $flavorText;
    private $armorMin;
    private $armorMax;
    private $attributes;
    private $attributesRaw = array();
    private $gems = array();
    private $socketEffects;
    private $craftedBy;

    private $isSet;
    private $set;

    private $isSeasonal;
    private $season;

    public function __construct($id, $name, $icon, $color, $tooltip, $level,
                                $requiredLevel, Attributes $attributes = null,
                                array $attributesRaw, array $gems)
        {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->color = $color;
        $this->tooltip = $tooltip;
        $this->level = $level;
        $this->requiredLevel = $requiredLevel;

        $this->attributes = $attributes;
        $this->attributesRaw = $attributesRaw;
        $this->gems = $gems;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getAttributesRaw()
        {
        return $this->attributesRaw;
        }
    }
