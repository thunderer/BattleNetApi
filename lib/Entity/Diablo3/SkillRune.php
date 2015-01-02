<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class SkillRune
    {
    private $slug;
    private $name;
    private $icon;
    private $level;
    private $tooltipUrl;
    private $description;
    private $simpleDescription;
    private $skillCalcId;

    public function __construct($slug, $name, $icon, $level, $tooltipUrl,
                                $description, $simpleDescription, $skillCalcId)
        {
        $this->slug = $slug;
        $this->name = $name;
        $this->icon = $icon;
        $this->level = $level;
        $this->tooltipUrl = $tooltipUrl;
        $this->description = $description;
        $this->simpleDescription = $simpleDescription;
        $this->skillCalcId = $skillCalcId;
        }
    }
