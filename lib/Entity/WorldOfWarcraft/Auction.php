<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Auction
    {
    private $id;
    private $item;
    private $owner;
    private $ownerRealm;
    private $bid;
    private $buyout;
    private $quantity;
    private $timeLeft;
    private $rand;
    private $seed;
    private $context;

    private function __construct()
        {
        }

    public static function create(array $data)
        {
        $a = new self();

        $a->id = $data['auc'];
        $a->item = $data['item'];
        $a->owner = $data['owner'];
        $a->ownerRealm = $data['ownerRealm'];
        $a->bid = $data['bid'];
        $a->buyout = $data['buyout'];
        $a->quantity = $data['quantity'];
        $a->timeLeft = $data['timeLeft'];
        $a->rand = $data['rand'];
        $a->seed = $data['seed'];
        $a->context = $data['context'];

        return $a;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getItem()
        {
        return $this->item;
        }

    public function getOwner()
        {
        return $this->owner;
        }

    public function getOwnerRealm()
        {
        return $this->ownerRealm;
        }

    public function getBid()
        {
        return $this->bid;
        }

    public function getBuyout()
        {
        return $this->buyout;
        }

    public function getQuantity()
        {
        return $this->quantity;
        }

    public function getTimeLeft()
        {
        return $this->timeLeft;
        }

    public function getRand()
        {
        return $this->rand;
        }

    public function getSeed()
        {
        return $this->seed;
        }

    public function getContext()
        {
        return $this->context;
        }
    }
