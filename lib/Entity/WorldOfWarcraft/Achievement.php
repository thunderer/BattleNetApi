<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Achievement
    {
    private $id;
    private $title;
    private $points;
    private $description;
    private $reward;
    private $rewardItems = array();
    private $icon;
    private $criteria = array();
    private $isAccountWide;
    private $factionId;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $a = new self();

        $a->id = $data['id'];
        $a->title = $data['title'];
        $a->points = $data['points'];
        $a->description = $data['description'];
        $a->reward = array_key_exists('reward', $data) ? $data['reward'] : null;
        $a->rewardItems = array_map(function(array $item) {
            return Item::createShort($item);
            }, $data['rewardItems']);
        $a->icon = $data['icon'];
        $a->criteria = $data['criteria'];
        $a->isAccountWide = $data['accountWide'];
        $a->factionId = $data['factionId'];

        return $a;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getTitle()
        {
        return $this->title;
        }

    public function getPoints()
        {
        return $this->points;
        }

    public function getDescription()
        {
        return $this->description;
        }

    public function getReward()
        {
        return $this->reward;
        }

    public function getRewardItems()
        {
        return $this->rewardItems;
        }

    public function getIcon()
        {
        return $this->icon;
        }

    public function getCriteria()
        {
        return $this->criteria;
        }

    public function isAccountWide()
        {
        return $this->isAccountWide;
        }

    public function getFactionId()
        {
        return $this->factionId;
        }
    }
