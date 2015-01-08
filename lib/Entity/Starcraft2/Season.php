<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Season
    {
    private $id;
    private $number;
    private $year;
    private $games;
    private $stats;

    function __construct($id, $number, $year, $games, array $stats)
        {
        $this->id = $id;
        $this->number = $number;
        $this->year = $year;
        $this->games = $games;
        $this->stats = $stats;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getNumber()
        {
        return $this->number;
        }

    public function getYear()
        {
        return $this->year;
        }

    public function getGames()
        {
        return $this->games;
        }

    public function getStats()
        {
        return $this->stats;
        }
    }
