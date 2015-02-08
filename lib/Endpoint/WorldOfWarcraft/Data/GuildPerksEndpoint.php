<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\GuildPerk;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Spell;

class GuildPerksEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/guild/perks';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return array_map(function(array $item) {
            return new GuildPerk($item['guildLevel'], Spell::create($item['spell']));
            }, $json['perks']);
        }
    }
