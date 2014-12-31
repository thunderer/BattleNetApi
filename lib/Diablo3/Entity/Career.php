<?php
namespace Thunder\BlizzardApi\Diablo3\Entity;

class Career
    {
    private $battleTag;

    private $paragonLevel;
    private $paragonLevelHardcore;
    private $paragonLevelSeason;
    private $paragonLevelSeasonHardcore;

    private $heroes = array();
    private $fallenHeroes = array();

    private $lastHeroPlayed;
    private $lastUpdated;
    private $kills;
    private $highestHardcoreLevel;
    private $timePlayedByClass;
    private $progression;
    private $seasonalProfiles;

    private $artisansSoftcore;
    private $artisansHardcore;
    private $artisansSeason;
    private $artisansSeasonHardcore;

    public function __construct($battleTag, array $heroes,
        $paragonLevel, $paragonLevelHardcore,
        $paragonLevelSeason, $paragonLevelSeasonHardcore,
        Artisans $softcore, Artisans $hardcore,
        Artisans $season, Artisans $seasonHardcore)
        {
        $this->battleTag = $battleTag;
        $this->heroes = $heroes;

        $this->paragonLevel = $paragonLevel;
        $this->paragonLevelHardcore = $paragonLevelHardcore;
        $this->paragonLevelSeason = $paragonLevelSeason;
        $this->paragonLevelSeasonHardcore = $paragonLevelSeasonHardcore;

        $this->artisansSoftcore = $softcore;
        $this->artisansHardcore = $hardcore;
        $this->artisansSeason = $season;
        $this->artisansSeasonHardcore = $seasonHardcore;
        }
    }
