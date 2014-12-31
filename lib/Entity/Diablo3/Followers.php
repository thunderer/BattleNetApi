<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Followers
    {
    private $templar;
    private $scoundrel;
    private $enchantress;

    public function __construct(Follower $templar, Follower $scoundrel, Follower $enchantress)
        {
        $this->templar = $templar;
        $this->scoundrel = $scoundrel;
        $this->enchantress = $enchantress;
        }

    public function getTemplar()
        {
        return $this->templar;
        }

    public function getScoundrel()
        {
        return $this->scoundrel;
        }

    public function getEnchantress()
        {
        return $this->enchantress;
        }
    }
