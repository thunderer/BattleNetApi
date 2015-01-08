<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class SeasonStat
    {
    private $wins;
    private $games;

    function __construct($wins, $games)
        {
        $this->wins = $wins;
        $this->games = $games;
        }

    public function getWins()
        {
        return $this->wins;
        }

    public function getGames()
        {
        return $this->games;
        }
    }
