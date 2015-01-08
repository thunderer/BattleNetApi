<?php
namespace Thunder\BlizzardApi\Endpoint\Starcraft2;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\Starcraft2\Ladder;
use Thunder\BlizzardApi\Entity\Starcraft2\Ladders;
use Thunder\BlizzardApi\Entity\Starcraft2\LaddersEntry;
use Thunder\BlizzardApi\Entity\Starcraft2\Profile;

class LaddersEndpoint implements EndpointInterface
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
        return '/sc2/profile/'.$this->id.'/'.$this->region.'/'.$this->name.'/ladders';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $currentSeason = $this->getLaddersEntries($json, 'currentSeason');
        $previousSeason = $this->getLaddersEntries($json, 'previousSeason');
        $showcasePlacement = $this->getLaddersEntries($json, 'showcasePlacement');

        return new Ladders($currentSeason, $previousSeason, $showcasePlacement);
        }

    private function getLaddersEntries(array $data, $index)
        {
        $items = $data[$index];


        return array_map(function(array $item) {
            return $this->getLaddersEntry($item);
            }, $items);
        }

    private function getLaddersEntry(array $data)
        {
        $characters = array_map(function(array $item) {
            return new Profile(
                $item['id'],
                $item['realm'],
                $item['displayName'],
                $item['clanName'],
                $item['clanTag'],
                $item['profilePath'],
                null, null, null, array(), null, array(), array(), null, array(), array());
            }, $data['characters']);

        return new LaddersEntry($this->getLadders($data['ladder']), $characters);
        }

    private function getLadders(array $data)
        {
        return array_map(function(array $item) {
            return $item ? new Ladder($item['ladderId'], $item['ladderName'],
                $item['division'], $item['rank'], $item['league'],
                $item['matchMakingQueue'], $item['wins'], $item['losses'],
                $item['showcase']) : null;
            }, $data);
        }
    }
