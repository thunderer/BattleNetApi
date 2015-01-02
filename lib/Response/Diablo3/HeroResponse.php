<?php
namespace Thunder\BlizzardApi\Response\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Hero;
use Thunder\BlizzardApi\ResponseInterface;

class HeroResponse implements ResponseInterface
    {
    private $hero;

    public function __construct(Hero $hero)
        {
        $this->hero = $hero;
        }

    public function getHero()
        {
        return $this->hero;
        }
    }
