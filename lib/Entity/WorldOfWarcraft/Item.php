<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Item
    {
    private $id;
    private $disenchantingSkillRank;
    private $description;
    private $name;
    private $icon;
    private $stackable;
    private $itemBind;
    private $bonusStats = array();
    private $itemSpells = array();
    private $buyPrice;
    private $class;
    private $subClass;
    private $containerSlots;
    // private $weaponInfo;
    private $inventoryType;
    private $isEquippable;
    private $itemLevel;
    private $maxCount;
    private $maxDurability;
    private $maxFactionId;
    private $minReputation;
    private $quality;
    private $sellPrice;
    private $requiredSkill;
    private $requiredLevel;
    private $requiredSkillRank;
    private $itemSourceId;
    private $itemSourceType;
    private $baseArmor;
    private $hasSockets;
    private $isAuctionable;
    private $armor;
    private $nameDescription;
    private $nameDescriptionColor;
    private $isUpgradable;
    private $heroicTooltip;
    private $context;
    // private $bonusLists = array();
    // private $availableContexts;
    // private $bonusSummary;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $item = new self();

        $item->id = $data['id'];
        $item->disenchantingSkillRank = $data['disenchantingSkillRank'];
        $item->description = $data['description'];
        $item->name = $data['name'];
        $item->icon = $data['icon'];
        $item->stackable = $data['stackable'];
        $item->itemBind = $data['itemBind'];
        $item->bonusStats = $data['bonusStats'];
        $item->itemSpells = $data['itemSpells'];
        $item->buyPrice = $data['buyPrice'];
        $item->itemClass = $data['itemClass'];
        $item->itemSubClass = $data['itemSubClass'];
        $item->containerSlots = $data['containerSlots'];
        // $json['weaponInfo'],
        $item->inventoryType = $data['inventoryType'];
        $item->isEquippable = $data['equippable'];
        $item->itemLevel = $data['itemLevel'];
        $item->maxCount = $data['maxCount'];
        $item->maxDurability = $data['maxDurability'];
        $item->minFactionId = $data['minFactionId'];
        $item->minReputation = $data['minReputation'];
        $item->quality = $data['quality'];
        $item->sellPrice = $data['sellPrice'];
        $item->requiredSkill = $data['requiredSkill'];
        $item->requiredSkillRank = $data['requiredSkillRank'];
        $item->itemSourceId = $data['itemSource']['sourceId'];
        $item->itemSourceType = $data['itemSource']['sourceType'];
        $item->baseArmor = $data['baseArmor'];
        $item->hasSockets = $data['hasSockets'];
        $item->isAuctionable = $data['isAuctionable'];
        $item->armor = $data['armor'];
        $item->displayInfoId = $data['displayInfoId'];
        $item->nameDescription = $data['nameDescription'];
        $item->nameDescriptionColor = $data['nameDescriptionColor'];
        $item->isUpgradable = $data['upgradable'];
        $item->heroicTooltip = $data['heroicTooltip'];
        $item->context = $data['context'];
        // $json['bonusLists']
        // $json['availableContexts']
        // $json['bonusSummary']

        return $item;
        }

    public static function createShort(array $data)
        {
        $item = new self();

        $item->id = $data['id'];
        $item->name = $data['name'];
        $item->icon = $data['icon'];
        $item->quality = $data['quality'];
        $item->itemLevel = $data['itemLevel'];
        // $item->tooltipParams = $data['id'];
        // $item->stats = $data['id'];
        $item->armor = $data['armor'];
        $item->context = $data['context'];
        // $item->bonusLists = $data['id'];

        return $item;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getDisenchantingSkillRank()
        {
        return $this->disenchantingSkillRank;
        }

    public function getDescription()
        {
        return $this->description;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getIcon()
        {
        return $this->icon;
        }

    public function getStackable()
        {
        return $this->stackable;
        }

    public function getItemBind()
        {
        return $this->itemBind;
        }

    public function getBonusStats()
        {
        return $this->bonusStats;
        }

    public function getItemSpells()
        {
        return $this->itemSpells;
        }

    public function getBuyPrice()
        {
        return $this->buyPrice;
        }

    public function getClass()
        {
        return $this->class;
        }

    public function getSubClass()
        {
        return $this->subClass;
        }

    public function getContainerSlots()
        {
        return $this->containerSlots;
        }

    public function getInventoryType()
        {
        return $this->inventoryType;
        }

    public function getIsEquippable()
        {
        return $this->isEquippable;
        }

    public function getItemLevel()
        {
        return $this->itemLevel;
        }

    public function getMaxCount()
        {
        return $this->maxCount;
        }

    public function getMaxDurability()
        {
        return $this->maxDurability;
        }

    public function getMaxFactionId()
        {
        return $this->maxFactionId;
        }

    public function getMinReputation()
        {
        return $this->minReputation;
        }

    public function getQuality()
        {
        return $this->quality;
        }

    public function getSellPrice()
        {
        return $this->sellPrice;
        }

    public function getRequiredSkill()
        {
        return $this->requiredSkill;
        }

    public function getRequiredLevel()
        {
        return $this->requiredLevel;
        }

    public function getRequiredSkillRank()
        {
        return $this->requiredSkillRank;
        }

    public function getItemSourceId()
        {
        return $this->itemSourceId;
        }

    public function getItemSourceType()
        {
        return $this->itemSourceType;
        }

    public function getBaseArmor()
        {
        return $this->baseArmor;
        }

    public function getHasSockets()
        {
        return $this->hasSockets;
        }

    public function getIsAuctionable()
        {
        return $this->isAuctionable;
        }

    public function getArmor()
        {
        return $this->armor;
        }

    public function getNameDescription()
        {
        return $this->nameDescription;
        }

    public function getNameDescriptionColor()
        {
        return $this->nameDescriptionColor;
        }

    public function getIsUpgradable()
        {
        return $this->isUpgradable;
        }

    public function getHeroicTooltip()
        {
        return $this->heroicTooltip;
        }

    public function getContext()
        {
        return $this->context;
        }
    }
