<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Achievements
    {
    private $achievements;
    private $categories;

    function __construct($achievements, $categories)
        {
        $this->achievements = $achievements;
        $this->categories = $categories;
        }

    public function getAchievements()
        {
        return $this->achievements;
        }

    public function getCategories()
        {
        return $this->categories;
        }
    }
