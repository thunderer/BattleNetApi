<?php
namespace Thunder\BlizzardApi\Endpoint\Starcraft2;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\Starcraft2\Icon;
use Thunder\BlizzardApi\Entity\Starcraft2\Reward;
use Thunder\BlizzardApi\Entity\Starcraft2\Rewards;

class RewardsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/sc2/data/rewards';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $fn = function(array $item) {
            $icon = $item['icon'];
            $icon = new Icon($icon['x'], $icon['y'], $icon['w'], $icon['y'],
                $icon['offset'], $icon['url']);
            $command = array_key_exists('command', $item) ? $item['command'] : null;
            $name = array_key_exists('name', $item) ? $item['name'] : null;
            $title = array_key_exists('title', $item) ? $item['title'] : null;

            return new Reward($item['id'], $name, $title, $command,
                $item['achievementId'], $icon);
            };
        $portraits = array_map($fn, $json['portraits']);
        $terranDecals = array_map($fn, $json['terranDecals']);
        $zergDecals = array_map($fn, $json['zergDecals']);
        $protossDecals = array_map($fn, $json['protossDecals']);
        $skins = array_map($fn, $json['skins']);
        $animations = array_map($fn, $json['animations']);

        return new Rewards($portraits, $terranDecals, $zergDecals, $protossDecals,
            $skins, $animations);
        }
    }
