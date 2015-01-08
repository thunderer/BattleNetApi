<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Career
    {
    const RACE_TERRAN = 1;
    const RACE_PROTOSS = 2;
    const RACE_ZERG = 3;

    private static $raceAliases = array(
        self::RACE_TERRAN => 'terran',
        self::RACE_PROTOSS => 'protoss',
        self::RACE_ZERG => 'zerg',
        );

    private $primaryRace;
    private $league;
    private $terranWins;
    private $protossWins;
    private $zergWins;
    private $highestRank1v1;
    private $highestRankTeam;
    private $seasonTotalGames;
    private $careerTotalGames;

    function __construct($primaryRace, $league, $terranWins, $protossWins,
                         $zergWins, $highestRank1v1, $highestRankTeam,
                         $seasonTotalGames, $careerTotalGames)
        {
        $this->setPrimaryRace($primaryRace);
        $this->league = $league;
        $this->terranWins = $terranWins;
        $this->protossWins = $protossWins;
        $this->zergWins = $zergWins;
        $this->highestRank1v1 = $highestRank1v1;
        $this->highestRankTeam = $highestRankTeam;
        $this->seasonTotalGames = $seasonTotalGames;
        $this->careerTotalGames = $careerTotalGames;
        }

    private function setPrimaryRace($race)
        {
        if(!array_key_exists($race, static::$raceAliases))
            {
            $msg = 'Invalid race identifier %s!';
            throw new \InvalidArgumentException(sprintf($msg, $race));
            }

        $this->primaryRace = $race;
        }

    public static function getRaceAliases()
        {
        return static::$raceAliases;
        }

    public function getPrimaryRace()
        {
        return $this->primaryRace;
        }

    public function getLeague()
        {
        return $this->league;
        }

    public function getTerranWins()
        {
        return $this->terranWins;
        }

    public function getProtossWins()
        {
        return $this->protossWins;
        }

    public function getZergWins()
        {
        return $this->zergWins;
        }

    public function getHighestRank1v1()
        {
        return $this->highestRank1v1;
        }

    public function getHighestRankTeam()
        {
        return $this->highestRankTeam;
        }

    public function getSeasonTotalGames()
        {
        return $this->seasonTotalGames;
        }

    public function getCareerTotalGames()
        {
        return $this->careerTotalGames;
        }
    }
