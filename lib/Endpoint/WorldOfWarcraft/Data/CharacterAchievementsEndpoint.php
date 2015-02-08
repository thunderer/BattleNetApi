<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Achievement;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\CharacterAchievement;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Item;

class CharacterAchievementsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/character/achievements';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new CharacterAchievement(
                $item['minGuildLevel'],
                $item['minGuildRepLevel'],
                array_key_exists('achievement', $item)
                    ? Achievement::create($item['achievement'])
                    : null,
                Item::createShort($item['item']));
            }, $json['rewards']);
        }
    }
