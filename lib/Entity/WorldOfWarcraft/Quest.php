<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Quest
    {
    private $id;
    private $title;
    private $requiredLevel;
    private $suggestedPartyMembers;
    private $category;
    private $level;

    function __construct($id, $title, $requiredLevel, $suggestedPartyMembers, $category, $level)
        {
        $this->id = $id;
        $this->title = $title;
        $this->requiredLevel = $requiredLevel;
        $this->suggestedPartyMembers = $suggestedPartyMembers;
        $this->category = $category;
        $this->level = $level;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getTitle()
        {
        return $this->title;
        }

    public function getRequiredLevel()
        {
        return $this->requiredLevel;
        }

    public function getSuggestedPartyMembers()
        {
        return $this->suggestedPartyMembers;
        }

    public function getCategory()
        {
        return $this->category;
        }

    public function getLevel()
        {
        return $this->level;
        }
    }
