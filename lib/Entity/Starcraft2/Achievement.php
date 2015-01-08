<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Achievement
    {
    private $id;
    private $title;
    private $description;
    private $categoryId;
    private $points;
    private $icon;

    function __construct($id, $title, $description, $categoryId, $points, Icon $icon)
        {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->points = $points;
        $this->icon = $icon;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getTitle()
        {
        return $this->title;
        }

    public function getDescription()
        {
        return $this->description;
        }

    public function getCategoryId()
        {
        return $this->categoryId;
        }

    public function getPoints()
        {
        return $this->points;
        }

    public function getIcon()
        {
        return $this->icon;
        }
    }
