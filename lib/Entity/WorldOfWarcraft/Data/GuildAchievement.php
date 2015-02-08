<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class GuildAchievement
    {
    private $id;
    private $achievements = array();

    function __construct($id, array $achievements)
        {
        $this->id = $id;
        $this->achievements = $achievements;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getAchievements()
        {
        return $this->achievements;
        }
    }
