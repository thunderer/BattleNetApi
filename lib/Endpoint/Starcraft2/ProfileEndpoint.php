<?php
namespace Thunder\BlizzardApi\Endpoint\Starcraft2;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\Starcraft2\Career;
use Thunder\BlizzardApi\Entity\Starcraft2\Icon;
use Thunder\BlizzardApi\Entity\Starcraft2\Profile;
use Thunder\BlizzardApi\Entity\Starcraft2\SwarmLevel;

class ProfileEndpoint implements EndpointInterface
    {
    private $id;
    private $region;
    private $name;

    function __construct($id, $region, $name)
        {
        $this->id = $id;
        $this->region = $region;
        $this->name = $name;
        }

    public function getPath()
        {
        return '/sc2/profile/'.$this->id.'/'.$this->region.'/'.$this->name;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);
        $icon = $json['portrait'];
        $icon = new Icon(
            $icon['x'], $icon['y'],
            $icon['w'], $icon['h'],
            $icon['offset'], $icon['url']);

        $career = $json['career'];
        $racesAliases = array_flip(Career::getRaceAliases());
        $league = array_key_exists('league', $career)
            ? $career['league']
            : null;
        $career = new Career(
            $racesAliases[strtolower($career['primaryRace'])], $league,
            $career['terranWins'], $career['protossWins'], $career['zergWins'],
            $career['highest1v1Rank'], $career['highestTeamRank'],
            $career['seasonTotalGames'], $career['careerTotalGames']);

        return new Profile(
            $json['id'], $json['realm'], $json['displayName'],
            $json['clanName'], $json['clanTag'], $json['profilePath'],
            $icon, $career, $json['swarmLevels']['level'],
            $this->getSwarmLevels($json['swarmLevels'], array('')),
            $json['campaign'],
            $json['rewards']['selected'], $json['rewards']['earned'],
            $json['achievements']['points']['totalPoints'],
            $json['achievements']['points']['categoryPoints'],
            $this->getAchievements($json['achievements']['achievements']));
        }

    private function getSwarmLevels(array $data)
        {
        $levels = array();
        $raceAliases = Career::getRaceAliases();
        foreach(array_values($raceAliases) as $raceAlias)
            {
            $item = $data[$raceAlias];
            $levels[$raceAlias] = new SwarmLevel($item['level'], $item['totalLevelXP'],
                $item['currentLevelXP']);
            }

        return $levels;
        }

    private function getAchievements(array $data)
        {
        return array_reduce($data, function(array $state, array $item) {
            $state[$item['achievementId']] = $item['completionDate'];
            return $state;
            }, array());
        }
    }
