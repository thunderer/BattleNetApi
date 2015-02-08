<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Achievement;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Item;

class CharacterAchievement
    {
    private $minimumGuildLevel;
    private $minimumGuildReputationLevel;
    private $achievement;
    private $item;

    function __construct($minimumGuildLevel, $minimumGuildReputationLevel,
                         Achievement $achievement = null, Item $item)
        {
        $this->minimumGuildLevel = $minimumGuildLevel;
        $this->minimumGuildReputationLevel = $minimumGuildReputationLevel;
        $this->achievement = $achievement;
        $this->item = $item;
        }

    public function getMinimumGuildLevel()
        {
        return $this->minimumGuildLevel;
        }

    public function getMinimumGuildReputationLevel()
        {
        return $this->minimumGuildReputationLevel;
        }

    public function getAchievement()
        {
        return $this->achievement;
        }

    public function getItem()
        {
        return $this->item;
        }
    }
