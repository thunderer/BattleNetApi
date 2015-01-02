<?php
namespace Thunder\BlizzardApi\Request\Diablo3;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Parser\Diablo3\HeroParser;
use Thunder\BlizzardApi\RequestInterface;

class HeroRequest implements RequestInterface
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

    public function getParser()
        {
        return new HeroParser();
        }
    }
