<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Reward
    {
    private $id;
    private $name;
    private $title;
    private $command;
    private $achievementId;
    private $icon;

    function __construct($id, $name, $title, $command, $achievementId, Icon $icon)
        {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->command = $command;
        $this->achievementId = $achievementId;
        $this->icon = $icon;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getTitle()
        {
        return $this->title;
        }

    public function getCommand()
        {
        return $this->command;
        }

    public function getAchievementId()
        {
        return $this->achievementId;
        }

    public function getIcon()
        {
        return $this->icon;
        }
    }
