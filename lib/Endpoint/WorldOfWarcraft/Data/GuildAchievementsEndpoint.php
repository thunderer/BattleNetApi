<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Achievement;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\GuildAchievement;

class GuildAchievementsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/guild/achievements';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            $achievements = array_map(function(array $data) {
                return Achievement::create($data);
                }, $item['achievements']);

            return new GuildAchievement($item['id'], $achievements);
            }, $json['achievements']);
        }
    }
