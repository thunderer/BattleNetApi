<?php
namespace Thunder\BlizzardApi\Endpoint\Starcraft2;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\Starcraft2\Achievement;
use Thunder\BlizzardApi\Entity\Starcraft2\AchievementCategory;
use Thunder\BlizzardApi\Entity\Starcraft2\Achievements;
use Thunder\BlizzardApi\Entity\Starcraft2\Icon;

class AchievementsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/sc2/data/achievements';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $achievements = array_map(function(array $item) {
            $icon = $item['icon'];
            $icon = new Icon($icon['x'], $icon['y'], $icon['w'], $icon['y'],
                $icon['offset'], $icon['url']);

            return new Achievement($item['achievementId'], $item['title'],
                $item['description'], $item['categoryId'], $item['points'], $icon);
            }, $json['achievements']);
        $categories = array_map(function(array $item) {
            $children = array_map(function(array $child) {
                return new AchievementCategory($child['categoryId'], $child['title'],
                    $child['featuredAchievementId'], array());
                }, array_key_exists('children', $item) ? $item['children'] : array());

            return new AchievementCategory($item['categoryId'], $item['title'],
                $item['featuredAchievementId'], $children);
            }, $json['categories']);

        return new Achievements($achievements, $categories);
        }
    }
