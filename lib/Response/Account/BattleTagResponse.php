<?php
namespace Thunder\BlizzardApi\Response\Account;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
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
