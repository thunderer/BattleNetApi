<?php
namespace Thunder\BlizzardApi\Request\Diablo3;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Parser\Diablo3\CareerParser;
use Thunder\BlizzardApi\RequestInterface;

class CareerRequest implements RequestInterface
    {
    private $battleTag;

    public function __construct(BattleTag $battleTag)
        {
        $this->battleTag = $battleTag;
        }

    public function getPath()
        {
        return '/d3/profile/'.$this->battleTag->getBattleTag();
        }

    public function getParser()
        {
        return new CareerParser();
        }
    }
