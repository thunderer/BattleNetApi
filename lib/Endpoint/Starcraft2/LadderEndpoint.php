<?php
namespace Thunder\BlizzardApi\Endpoint\Starcraft2;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\Starcraft2\Career;
use Thunder\BlizzardApi\Entity\Starcraft2\LadderEntries;
use Thunder\BlizzardApi\Entity\Starcraft2\LadderEntry;
use Thunder\BlizzardApi\Entity\Starcraft2\Profile;
use Thunder\BlizzardApi\Exception\ParseException;

class LadderEndpoint implements EndpointInterface
    {
    private $id;

    function __construct($id)
        {
        $this->id = $id;
        }

    public function getPath()
        {
        return '/sc2/ladder/'.$this->id;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return new LadderEntries(array_map(function(array $item) {
            $profile = $item['character'];
            $profile = new Profile(
                $profile['id'],
                $profile['realm'],
                $profile['displayName'],
                $profile['clanName'],
                $profile['clanTag'],
                $profile['profilePath'],
                null, null, null, array(), null, array(), array(), null, array(), array());

            $racesAliases = array_flip(Career::getRaceAliases());
            $favoriteRace = null;
            if(array_key_exists('favoriteRaceP1', $item))
                {
                if(in_array($item['favoriteRaceP1'], array('TERRAN', 'PROTOSS', 'ZERG')))
                    {
                    $favoriteRace = $racesAliases[strtolower($item['favoriteRaceP1'])];
                    }
                elseif('RANDOM' == $item['favoriteRaceP1'])
                    {
                    $favoriteRace = 'random';
                    }
                else
                    {
                    $msg = 'Invalid race identifier %s!';
                    throw new ParseException(sprintf($msg, $item['favoriteRaceP1']));
                    }
                }

            return new LadderEntry($profile,
                $item['joinTimestamp'], $item['points'], $item['wins'], $item['losses'],
                $item['highestRank'], $item['previousRank'], $favoriteRace);
            }, $json['ladderMembers']));
        }
    }
