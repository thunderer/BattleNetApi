<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Guild
    {
    private $lastModified;
    private $name;
    private $realm;
    private $battleGroup;
    private $level;
    private $side;
    private $achievementPoints;

    // FIXME: unsure how to represent those
    private $achievements;
    private $emblem;
    private $challenge;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $g = new self();

        $g->lastModified = $data['lastModified'];
        $g->name = $data['name'];
        $g->realm = $data['realm'];
        $g->battleGroup = $data['battlegroup'];
        $g->level = $data['level'];
        $g->side = $data['side'];
        $g->achievementPoints = $data['achievementPoints'];

        return $g;
        }

    public function getLastModified()
        {
        return $this->lastModified;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getRealm()
        {
        return $this->realm;
        }

    public function getBattleGroup()
        {
        return $this->battleGroup;
        }

    public function getLevel()
        {
        return $this->level;
        }

    public function getSide()
        {
        return $this->side;
        }

    public function getAchievementPoints()
        {
        return $this->achievementPoints;
        }
    }
