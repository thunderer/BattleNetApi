<?php
namespace Thunder\BlizzardApi\Endpoint\Starcraft2;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\Starcraft2\Match;

class MatchHistoryEndpoint implements EndpointInterface
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
        return '/sc2/profile/'.$this->id.'/'.$this->region.'/'.$this->name.'/matches';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $matches = array_map(function(array $item) {
            $results = array_flip(Match::getResultsAliases());
            $speeds = array_flip(Match::getSpeedsAliases());
            $types = array_flip(Match::getTypesAliases());

            return new Match($item['map'], $types[strtolower($item['type'])],
                $results[strtolower($item['decision'])],
                $speeds[strtolower($item['speed'])],
                $item['date']);
            }, $json['matches']);

        return $matches;
        }
    }
