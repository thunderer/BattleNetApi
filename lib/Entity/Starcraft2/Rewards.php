<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Rewards
    {
    private $portraits;
    private $terranDecals;
    private $zergDecals;
    private $protossDecals;
    private $skins;
    private $animations;

    function __construct(array $portraits, array $terranDecals, array $zergDecals,
                         array $protossDecals, array $skins, array $animations)
        {
        $this->portraits = $portraits;
        $this->terranDecals = $terranDecals;
        $this->zergDecals = $zergDecals;
        $this->protossDecals = $protossDecals;
        $this->skins = $skins;
        $this->animations = $animations;
        }

    public function getPortraits()
        {
        return $this->portraits;
        }

    public function getTerranDecals()
        {
        return $this->terranDecals;
        }

    public function getZergDecals()
        {
        return $this->zergDecals;
        }

    public function getProtossDecals()
        {
        return $this->protossDecals;
        }

    public function getSkins()
        {
        return $this->skins;
        }

    public function getAnimations()
        {
        return $this->animations;
        }
    }
