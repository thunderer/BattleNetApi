<?php
namespace Thunder\BlizzardApi\Diablo3\Entity;

class Act
    {
    private $isCompleted;
    private $quests;

    public function __construct($isCompleted, array $quests)
        {
        $this->isCompleted = $isCompleted;
        $this->quests = $quests;
        }

    public function isCompleted()
        {
        return $this->isCompleted;
        }

    public function getQuests()
        {
        return $this->quests;
        }
    }
