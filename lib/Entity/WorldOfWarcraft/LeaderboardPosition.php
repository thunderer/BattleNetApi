<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class LeaderboardPosition
    {
    private $position;
    private $rating;
    private $name;
    private $realmId;
    private $realmName;
    private $realmSlug;
    private $raceId;
    private $classId;
    private $specId;
    private $factionId;
    private $genderId;
    private $seasonWins;
    private $seasonLosses;
    private $weeklyWins;
    private $weeklyLosses;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $l = new self();

        $l->position = $data['ranking'];
        $l->rating = $data['rating'];
        $l->name = $data['name'];
        $l->realmId = $data['realmId'];
        $l->realmName = $data['realmName'];
        $l->realmSlug = $data['realmSlug'];
        $l->raceId = $data['raceId'];
        $l->classId = $data['classId'];
        $l->specId = $data['specId'];
        $l->factionId = $data['factionId'];
        $l->genderId = $data['genderId'];
        $l->seasonWins = $data['seasonWins'];
        $l->seasonLosses = $data['seasonLosses'];
        $l->weeklyWins = $data['weeklyWins'];
        $l->weeklyLosses = $data['weeklyLosses'];

        return $l;
        }
    }
