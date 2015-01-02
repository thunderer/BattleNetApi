<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class ArtisanTier
    {
    private $tier;
    private $tierLevel;
    private $percent;
    private $trainedRecipes = array();

    function __construct($tier, $tierLevel, $percent, array $trainedRecipes)
        {
        $this->tier = $tier;
        $this->tierLevel = $tierLevel;
        $this->percent = $percent;
        $this->trainedRecipes = $trainedRecipes;
        }

    public function getTier()
        {
        return $this->tier;
        }

    public function getTierLevel()
        {
        return $this->tierLevel;
        }

    public function getPercent()
        {
        return $this->percent;
        }

    public function getTrainedRecipes()
        {
        return $this->trainedRecipes;
        }
    }
