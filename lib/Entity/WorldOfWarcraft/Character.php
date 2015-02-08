<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Character
    {
    private $lastModified;
    private $name;
    private $realm;
    private $battleGroup;
    private $class;
    private $race;
    private $gender;
    private $level;
    private $achievementPoints;
    private $thumbnail;
    private $calcClass;
    private $totalHonorableKills;

    // specific endpoints, unsure how to implement
    private $appearance;
    private $achievements;
    private $feed;
    private $guild;
    private $items;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $c = new self();

        $c->lastModified = $data['lastModified'];
        $c->name = $data['name'];
        $c->realm = $data['realm'];
        $c->battleGroup = $data['battlegroup'];
        $c->class = $data['class'];
        $c->race = $data['race'];
        $c->gender = $data['gender'];
        $c->level = $data['level'];
        $c->achievementPoints = $data['achievementPoints'];
        $c->thumbnail = $data['thumbnail'];
        $c->calcClass = $data['calcClass'];
        $c->totalHonorableKills = $data['totalHonorableKills'];

        return $c;
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

    public function getClass()
        {
        return $this->class;
        }

    public function getRace()
        {
        return $this->race;
        }

    public function getGender()
        {
        return $this->gender;
        }

    public function getLevel()
        {
        return $this->level;
        }

    public function getAchievementPoints()
        {
        return $this->achievementPoints;
        }

    public function getThumbnail()
        {
        return $this->thumbnail;
        }

    public function getCalcClass()
        {
        return $this->calcClass;
        }

    public function getTotalHonorableKills()
        {
        return $this->totalHonorableKills;
        }
    }
