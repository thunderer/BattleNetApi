<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Hero
    {
    const CLASS_BARBARIAN = 1;
    const CLASS_CRUSADER = 2;
    const CLASS_DEMON_HUNTER = 3;
    const CLASS_MONK = 4;
    const CLASS_WITCH_DOCTOR = 5;
    const CLASS_WIZARD = 6;

    const GENDER_MALE = 0;
    const GENDER_FEMALE = 1;

    private static $classAliases = array(
        self::CLASS_BARBARIAN => 'barbarian',
        self::CLASS_CRUSADER => 'crusader',
        self::CLASS_DEMON_HUNTER => 'demon-hunter',
        self::CLASS_MONK => 'monk',
        self::CLASS_WITCH_DOCTOR => 'witch-doctor',
        self::CLASS_WIZARD => 'wizard',
        );

    private static $genderAliases = array(
        self::GENDER_MALE => 'male',
        self::GENDER_FEMALE => 'female',
        );

    private $id;
    private $name;
    private $class;
    private $gender;
    private $level;
    private $paragonLevel;
    private $isHardcore;
    private $isSeasonal;
    private $seasonCreated;
    private $skills = array();
    private $isDead;
    private $lastUpdated;

    private $equipment;
    private $followers;
    private $stats;

    public function __construct($id, $name, $class, $gender, $level, $paragonLevel,
                                HeroEquipment $equipment = null,
                                Followers $followers = null, HeroStats $stats = null,
                                $isDead, $isHardcore, $isSeasonal, $lastUpdated)
        {
        $this->id = $id;
        $this->name = $name;
        $this->setClass($class);
        $this->setGender($gender);
        $this->level = $level;
        $this->paragonLevel = $paragonLevel;
        $this->followers = $followers;
        $this->isDead = $isDead;
        $this->isHardcore = $isHardcore;
        $this->isSeasonal = $isSeasonal;
        $this->lastUpdated = $lastUpdated;

        $this->equipment = $equipment;
        $this->followers = $followers;
        $this->stats = $stats;
        }

    public static function getClassAliases()
        {
        return static::$classAliases;
        }

    public static function getGenderAliases()
        {
        return static::$genderAliases;
        }

    private function setClass($class)
        {
        if(!in_array($class, array_keys(static::getClassAliases())))
            {
            throw new \RuntimeException('Invalid class identifier!');
            }

        $this->class = $class;
        }

    private function setGender($gender)
        {
        if(!in_array($gender, array_keys(static::getGenderAliases())))
            {
            throw new \RuntimeException('Invalid gender identifier!');
            }

        $this->gender = $gender;
        }

    /* --- GETTERS --------------------------------------------------------- */

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getClass()
        {
        return $this->class;
        }
    }
