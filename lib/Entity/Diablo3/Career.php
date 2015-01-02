<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

use Thunder\BlizzardApi\Entity\Account\BattleTag;

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

    private $artisans;
    private $artisansHardcore;
    private $artisansSeason;
    private $artisansSeasonHardcore;

    public function __construct(BattleTag $battleTag, array $heroes, array $fallenHeroes,
        $paragonLevel, $paragonLevelHardcore,
        $paragonLevelSeason, $paragonLevelSeasonHardcore,
        $highestHardcoreLevel,
        Artisans $artisans, Artisans $artisansHardcore,
        Artisans $artisansSeason, Artisans $artisansSeasonHardcore)
        {
        $this->battleTag = $battleTag;
        $this->heroes = $heroes;
        $this->fallenHeroes = $fallenHeroes;

        $this->paragonLevel = $paragonLevel;
        $this->paragonLevelHardcore = $paragonLevelHardcore;
        $this->paragonLevelSeason = $paragonLevelSeason;
        $this->paragonLevelSeasonHardcore = $paragonLevelSeasonHardcore;
        $this->highestHardcoreLevel = $highestHardcoreLevel;

        $this->artisans = $artisans;
        $this->artisansHardcore = $artisansHardcore;
        $this->artisansSeason = $artisansSeason;
        $this->artisansSeasonHardcore = $artisansSeasonHardcore;
        }

    public function getBattleTag()
        {
        return $this->battleTag;
        }

    public function getHeroes()
        {
        return $this->heroes;
        }

    public function getFallenHeroes()
        {
        return $this->fallenHeroes;
        }

    public function getParagonLevel()
        {
        return $this->paragonLevel;
        }

    public function getParagonLevelHardcore()
        {
        return $this->paragonLevelHardcore;
        }

    public function getParagonLevelSeason()
        {
        return $this->paragonLevelSeason;
        }

    public function getParagonLevelSeasonHardcore()
        {
        return $this->paragonLevelSeasonHardcore;
        }

    public function getHighestHardcoreLevel()
        {
        return $this->highestHardcoreLevel;
        }

    public function getArtisans()
        {
        return $this->artisans;
        }

    public function getArtisansHardcore()
        {
        return $this->artisansHardcore;
        }

    public function getArtisansSeason()
        {
        return $this->artisansSeason;
        }

    public function getArtisansSeasonHardcore()
        {
        return $this->artisansSeasonHardcore;
        }
    }
