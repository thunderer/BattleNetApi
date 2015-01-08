<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class AchievementCategory
    {
    private $id;
    private $title;
    private $achievementId;
    private $children = array();

    function __construct($id, $title, $achievementId, array $children)
        {
        $this->id = $id;
        $this->title = $title;
        $this->achievementId = $achievementId;
        $this->children = $children;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getTitle()
        {
        return $this->title;
        }

    public function getAchievementId()
        {
        return $this->achievementId;
        }

    public function getChildren()
        {
        return $this->children;
        }
    }
