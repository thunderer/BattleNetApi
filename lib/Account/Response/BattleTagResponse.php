<?php
namespace Thunder\BlizzardApi\Account\Response;

use Thunder\BlizzardApi\Account\Entity\BattleTag;
use Thunder\BlizzardApi\ResponseInterface;

class BattleTagResponse implements ResponseInterface
    {
    private $battleTag;

    public function __construct(BattleTag $battleTag)
        {
        $this->battleTag = $battleTag;
        }

    public function getBattleTag()
        {
        return $this->battleTag;
        }
    }
