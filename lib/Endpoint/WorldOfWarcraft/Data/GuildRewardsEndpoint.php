<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Achievement;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\GuildReward;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Item;

class GuildRewardsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/guild/rewards';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new GuildReward(
                $item['minGuildLevel'],
                $item['minGuildRepLevel'],
                array_key_exists('races', $item) ? $item['races'] : array(),
                array_key_exists('achievement', $item)
                    ? Achievement::create($item['achievement'])
                    : null,
                Item::createShort($item['item']));
            }, $json['rewards']);
        }
    }
