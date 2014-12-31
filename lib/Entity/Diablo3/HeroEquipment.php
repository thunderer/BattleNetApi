<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class HeroEquipment
    {
    private $head;
    private $torso;
    private $feet;
    private $hands;
    private $shoulders;
    private $legs;
    private $bracers;
    private $mainHand;
    private $offHand;
    private $waist;
    private $leftFinger;
    private $rightFinger;
    private $neck;

    public function __construct(Item $head, Item $torso, Item $feet, Item $hands,
                                Item $shoulders, Item $legs, Item $bracers,
                                Item $mainHand, Item $offHand, Item $waist,
                                Item $leftFinger, Item $rightFinger, Item $neck)
        {
        $this->head = $head;
        $this->torso = $torso;
        $this->feet = $feet;
        $this->hands = $hands;
        $this->shoulders = $shoulders;
        $this->legs = $legs;
        $this->bracers = $bracers;
        $this->mainHand = $mainHand;
        $this->offHand = $offHand;
        $this->waist = $waist;
        $this->leftFinger = $leftFinger;
        $this->rightFinger = $rightFinger;
        $this->neck = $neck;
        }
    }
