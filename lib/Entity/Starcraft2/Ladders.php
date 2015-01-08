<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Ladders
    {
    private $currentSeason;
    private $previousSeason;
    private $showcasePlacement;

    function __construct(array $currentSeason, array $previousSeason, array $showcasePlacement)
        {
        $this->currentSeason = $currentSeason;
        $this->previousSeason = $previousSeason;
        $this->showcasePlacement = $showcasePlacement;
        }

    public function getCurrentSeason()
        {
        return $this->currentSeason;
        }

    public function getPreviousSeason()
        {
        return $this->previousSeason;
        }

    public function getShowcasePlacement()
        {
        return $this->showcasePlacement;
        }
    }
