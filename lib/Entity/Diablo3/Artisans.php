<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Artisans
    {
    private $blacksmith;
    private $jeweler;
    private $mystic;

    public function __construct(Artisan $blacksmith, Artisan $jeweler, Artisan $mystic)
        {
        $this->blacksmith = $blacksmith;
        $this->jeweler = $jeweler;
        $this->mystic = $mystic;
        }

    public function getBlacksmith()
        {
        return $this->blacksmith;
        }

    public function getJeweler()
        {
        return $this->jeweler;
        }

    public function getMystic()
        {
        return $this->mystic;
        }
    }
