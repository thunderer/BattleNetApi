<?php
namespace Thunder\BlizzardApi\Parser\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Hero;
use Thunder\BlizzardApi\Entity\Diablo3\HeroEquipment;
use Thunder\BlizzardApi\Entity\Diablo3\HeroStats;
use Thunder\BlizzardApi\Entity\Diablo3\Item;
use Thunder\BlizzardApi\ParserInterface;
use Thunder\BlizzardApi\Response\Diablo3\HeroResponse;

class HeroParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);
        $classes = array_flip(Hero::getClassAliases());

        $jsonStats = $json['stats'];
        $stats = new HeroStats(
            $jsonStats['life'],
            $jsonStats['damage'],
            $jsonStats['toughness'],
            $jsonStats['healing'],
            $jsonStats['armor'],
            $jsonStats['strength'],
            $jsonStats['dexterity'],
            $jsonStats['vitality'],
            $jsonStats['intelligence'],
            $jsonStats['physicalResist'],
            $jsonStats['fireResist'],
            $jsonStats['coldResist'],
            $jsonStats['lightningResist'],
            $jsonStats['poisonResist'],
            $jsonStats['arcaneResist'],
            $jsonStats['damageIncrease'],
            $jsonStats['damageReduction'],
            $jsonStats['critChance'],
            $jsonStats['critDamage'],
            $jsonStats['blockChance'],
            $jsonStats['blockAmountMin'],
            $jsonStats['blockAmountMax'],
            $jsonStats['thorns'],
            $jsonStats['lifeSteal'],
            $jsonStats['lifePerKill'],
            $jsonStats['lifeOnHit'],
            $jsonStats['goldFind'],
            $jsonStats['magicFind'],
            $jsonStats['primaryResource'],
            $jsonStats['secondaryResource']);

        $equipment = new HeroEquipment(
            $this->getItem($json, 'head'),
            $this->getItem($json, 'torso'),
            $this->getItem($json, 'feet'),
            $this->getItem($json, 'hands'),
            $this->getItem($json, 'shoulders'),
            $this->getItem($json, 'legs'),
            $this->getItem($json, 'bracers'),
            $this->getItem($json, 'mainHand'),
            $this->getItem($json, 'offHand'),
            $this->getItem($json, 'waist'),
            $this->getItem($json, 'leftFinger'),
            $this->getItem($json, 'rightFinger'),
            $this->getItem($json, 'neck'));

        $hero = new Hero($json['id'], $json['name'], $classes[$json['class']],
            $json['gender'], $json['level'], $json['paragonLevel'],
            $equipment, null, $stats, $json['dead'], $json['hardcore'],
            $json['seasonal'], $json['last-updated']);

        return new HeroResponse($hero);
        }

    private function getItem(array $data, $index)
        {
        $item = $data['items'][$index];

        return new Item($item['id'], $item['name'], $item['icon'],
                        $item['displayColor'], $item['tooltipParams'],
                        null, null, null, array(), array());
        }
    }
