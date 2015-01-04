<?php
namespace Thunder\BlizzardApi\Endpoint\Diablo3;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Entity\Diablo3\Follower;
use Thunder\BlizzardApi\Entity\Diablo3\Followers;
use Thunder\BlizzardApi\Entity\Diablo3\Hero;
use Thunder\BlizzardApi\Entity\Diablo3\HeroEquipment;
use Thunder\BlizzardApi\Entity\Diablo3\HeroStats;
use Thunder\BlizzardApi\Entity\Diablo3\Item;
use Thunder\BlizzardApi\Entity\Diablo3\Skill;
use Thunder\BlizzardApi\Entity\Diablo3\Skills;
use Thunder\BlizzardApi\EndpointInterface;

class HeroEndpoint implements EndpointInterface
    {
    private $battleTag;
    private $heroId;

    public function __construct(BattleTag $battleTag, $heroId)
        {
        $this->battleTag = $battleTag;
        $this->heroId = $heroId;
        }

    public function getPath()
        {
        return '/d3/profile/'.$this->battleTag->getBattleTag().'/hero/'.$this->heroId;
        }

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

        $followers = new Followers(
            $this->getFollower($json, 'templar'),
            $this->getFollower($json, 'scoundrel'),
            $this->getFollower($json, 'enchantress'));

        $hero = new Hero($json['id'], $json['name'], $classes[$json['class']],
            $json['gender'], $json['level'], $json['paragonLevel'],
            $equipment, $followers, $stats, $json['dead'], $json['hardcore'],
            $json['seasonal'], $json['last-updated']);

        return $hero;
        }

    private function getItem(array $data, $index)
        {
        $item = $data['items'][$index];

        return new Item($item['id'], $item['name'], $item['icon'],
                        $item['displayColor'], $item['tooltipParams'],
                        null, null, null, array(), array());
        }

    private function getFollower(array $data, $index)
        {
        $item = $data['followers'][$index];

        $skillFn = function(array $data) {
        if(!array_key_exists('skill', $data))
            if(!$data)
                {
                return null;
                }
            $data = $data['skill'];

            return new Skill($data['slug'], $data['name'], $data['icon'],
                $data['level'], null, $data['tooltipUrl'], $data['description'],
                $data['simpleDescription'], $data['skillCalcId'], null);
            };
        $skills = new Skills(array_filter(array_map($skillFn, $item['skills'])), array());

        return new Follower($item['slug'], null, null, null, $skills);
        }
    }
