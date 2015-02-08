<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class Glyph
    {
    private $glyph;
    private $item;
    private $name;
    private $icon;
    private $typeId;

    function __construct($glyph, $item, $name, $icon, $typeId)
        {
        $this->glyph = $glyph;
        $this->item = $item;
        $this->name = $name;
        $this->icon = $icon;
        $this->typeId = $typeId;
        }

    public function getGlyph()
        {
        return $this->glyph;
        }

    public function getItem()
        {
        return $this->item;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getIcon()
        {
        return $this->icon;
        }

    public function getTypeId()
        {
        return $this->typeId;
        }
    }
