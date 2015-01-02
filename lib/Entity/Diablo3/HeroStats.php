<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class HeroStats
    {
    private $life;
    private $damage;
    private $toughness;
    private $healing;
    private $armor;
    private $strength;
    private $dexterity;
    private $vitality;
    private $intelligence;
    private $resistPhysical;
    private $resistFire;
    private $resistCold;
    private $resistLightning;
    private $resistPoison;
    private $resistArcane;
    private $damageIncrease;
    private $damageReduction;
    private $criticalChance;
    private $criticalDamage;
    private $blockChance;
    private $blockAmountMin;
    private $blockAmountMax;
    private $thorns;
    private $lifeSteal;
    private $lifePerKill;
    private $lifeOnHit;
    private $goldFind;
    private $magicFind;
    private $primaryResource;
    private $secondaryResource;

    public function __construct($life, $damage, $toughness, $healing, $armor,
                                $strength, $dexterity, $vitality, $intelligence,
                                $resistPhysical, $resistFire, $resistCold,
                                $resistLightning, $resistPoison, $resistArcane,
                                $damageIncrease, $damageReduction,
                                $criticalChance, $criticalDamage,
                                $blockChance, $blockAmountMin, $blockAmountMax,
                                $thorns, $lifeSteal, $lifePerKill, $lifeOnHit,
                                $goldFind, $magicFind,
                                $primaryResource, $secondaryResource)
        {
        $this->life = $life;
        $this->damage = $damage;
        $this->toughness = $toughness;
        $this->healing = $healing;
        $this->armor = $armor;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->vitality = $vitality;
        $this->intelligence = $intelligence;
        $this->resistPhysical = $resistPhysical;
        $this->resistFire = $resistFire;
        $this->resistCold = $resistCold;
        $this->resistLightning = $resistLightning;
        $this->resistPoison = $resistPoison;
        $this->resistArcane = $resistArcane;
        $this->damageIncrease = $damageIncrease;
        $this->criticalChance = $criticalChance;
        $this->damageReduction = $damageReduction;
        $this->criticalDamage = $criticalDamage;
        $this->blockChance = $blockChance;
        $this->blockAmountMin = $blockAmountMin;
        $this->blockAmountMax = $blockAmountMax;
        $this->thorns = $thorns;
        $this->lifeSteal = $lifeSteal;
        $this->lifePerKill = $lifePerKill;
        $this->lifeOnHit = $lifeOnHit;
        $this->goldFind = $goldFind;
        $this->magicFind = $magicFind;
        $this->primaryResource = $primaryResource;
        $this->secondaryResource = $secondaryResource;
        }
    }
