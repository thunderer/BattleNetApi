<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\ClassTalents;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\Glyph;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\Spec;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data\Talent;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Spell;

class TalentsEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/wow/data/talents';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $result = array();
        foreach($json as $item)
            {
            $glyphs = array_map(function(array $item) {
                return new Glyph($item['glyph'], $item['item'], $item['name'],
                                    $item['icon'], $item['typeId']);
                }, $item['glyphs']);

            $specs = array_map(function(array $item) {
                return new Spec($item['name'], $item['role'], $item['backgroundImage'],
                    $item['icon'], $item['description'], $item['order']);
                }, $item['specs']);

            $talents = array();
            foreach($item['talents'] as $tier)
                {
                foreach($tier as $talentsData)
                    {
                    foreach($talentsData as $talent)
                        {
                        $talents[] = new Talent($talent['tier'], $talent['column'], Spell::create($talent['spell']));
                        }
                    }
                }

            $petSpecs = array_key_exists('petSpecs', $item)
                ? array_map(function(array $item) {
                    return new Spec($item['name'], $item['role'], $item['backgroundImage'],
                        $item['icon'], $item['description'], $item['order']);
                    }, $item['petSpecs'])
                : array();

            $result[$item['class']] = new ClassTalents($item['class'], $glyphs, $specs, $talents, $petSpecs);
            }

        return $result;
        }
    }
