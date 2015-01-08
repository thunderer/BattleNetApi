<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class SwarmLevel
    {
    private $level;
    private $totalLevelExperience;
    private $currentLevelExperience;

    function __construct($level, $totalLevelExperience, $currentLevelExperience)
        {
        $this->level = $level;
        $this->totalLevelExperience = $totalLevelExperience;
        $this->currentLevelExperience = $currentLevelExperience;
        }

    public function getLevel()
        {
        return $this->level;
        }

    public function getTotalLevelExperience()
        {
        return $this->totalLevelExperience;
        }

    public function getCurrentLevelExperience()
        {
        return $this->currentLevelExperience;
        }
    }
