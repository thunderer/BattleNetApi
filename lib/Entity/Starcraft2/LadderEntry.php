<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class LadderEntry
    {
    private $character;
    private $joinedAt;
    private $points;
    private $wins;
    private $losses;
    private $highestRank;
    private $previousRank;
    private $favoriteRace;

    function __construct(Profile $character, $joinedAt, $points, $wins, $losses,
                         $highestRank, $previousRank, $favoriteRace)
        {
        $this->character = $character;
        $this->joinedAt = $joinedAt;
        $this->points = $points;
        $this->wins = $wins;
        $this->losses = $losses;
        $this->highestRank = $highestRank;
        $this->previousRank = $previousRank;
        $this->favoriteRace = $favoriteRace;
        }

    public function getCharacter()
        {
        return $this->character;
        }

    public function getJoinedAt()
        {
        return $this->joinedAt;
        }

    public function getPoints()
        {
        return $this->points;
        }

    public function getWins()
        {
        return $this->wins;
        }

    public function getLosses()
        {
        return $this->losses;
        }

    public function getHighestRank()
        {
        return $this->highestRank;
        }

    public function getPreviousRank()
        {
        return $this->previousRank;
        }

    public function getFavoriteRace()
        {
        return $this->favoriteRace;
        }
    }
