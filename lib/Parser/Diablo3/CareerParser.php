<?php
namespace Thunder\BlizzardApi\Parser\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Artisan;
use Thunder\BlizzardApi\Entity\Diablo3\Artisans;
use Thunder\BlizzardApi\Entity\Diablo3\Career;
use Thunder\BlizzardApi\Entity\Diablo3\Hero;
use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\ParserInterface;
use Thunder\BlizzardApi\Response\Diablo3\CareerResponse;

class CareerParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $heroes = array_map(function(array $data) {
            $classes = array_flip(Hero::getClassAliases());

            return new Hero($data['id'], $data['name'], $classes[$data['class']],
                $data['gender'], $data['level'], $data['paragonLevel'],
                null, null, null, $data['dead'], $data['hardcore'],
                $data['seasonal'], $data['last-updated']);
            }, $json['heroes']);
        $fallenHeroes = array_map(function(array $data) {
            $classes = array_flip(Hero::getClassAliases());

            return new Hero(null, $data['name'], $classes[$data['class']],
                $data['gender'], $data['level'], null,
                null, null, null, true, $data['hardcore'],
                false, null);
            }, $json['fallenHeroes']);

        $career = new Career(new BattleTag($json['battleTag']), $heroes, $fallenHeroes,
            $json['paragonLevel'], $json['paragonLevelHardcore'],
            $json['paragonLevelSeason'], $json['paragonLevelSeasonHardcore'],
            $json['highestHardcoreLevel'],
            $this->getArtisans($json, 'blacksmith', 'jeweler', 'mystic'),
            $this->getArtisans($json, 'blacksmithHardcore', 'jewelerHardcore', 'mysticHardcore'),
            $this->getArtisans($json, 'blacksmithSeason', 'jewelerSeason', 'mysticSeason'),
            $this->getArtisans($json, 'blacksmithSeasonHardcore', 'jewelerSeasonHardcore', 'mysticSeasonHardcore'));

        return new CareerResponse($career);
        }

    private function getArtisans(array $data, $blacksmith, $jeweler, $mystic)
        {
        return new Artisans(
            $this->getArtisan($data, $blacksmith),
            $this->getArtisan($data, $jeweler),
            $this->getArtisan($data, $mystic));
        }

    private function getArtisan($data, $index)
        {
        return new Artisan(
            $data[$index]['slug'],
            null,
            null,
            $data[$index]['level'],
            $data[$index]['stepCurrent'],
            $data[$index]['stepMax']);
        }
    }
