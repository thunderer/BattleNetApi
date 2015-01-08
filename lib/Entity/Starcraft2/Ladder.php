<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Ladder
    {
    private $id;
    private $name;
    private $division;
    private $rank;
    private $league;
    private $matchQueue;
    private $wins;
    private $losses;
    private $isShowcase;

    function __construct($id, $name, $division, $rank, $league, $matchQueue, $wins, $losses, $isShowcase)
        {
        $this->id = $id;
        $this->name = $name;
        $this->division = $division;
        $this->rank = $rank;
        $this->league = $league;
        $this->matchQueue = $matchQueue;
        $this->wins = $wins;
        $this->losses = $losses;
        $this->isShowcase = $isShowcase;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getDivision()
        {
        return $this->division;
        }

    public function getRank()
        {
        return $this->rank;
        }

    public function getLeague()
        {
        return $this->league;
        }

    public function getMatchQueue()
        {
        return $this->matchQueue;
        }

    public function getWins()
        {
        return $this->wins;
        }

    public function getLosses()
        {
        return $this->losses;
        }

    public function isShowcase()
        {
        return $this->isShowcase;
        }
    }
