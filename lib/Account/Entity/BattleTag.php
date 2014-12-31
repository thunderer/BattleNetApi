<?php
namespace Thunder\BlizzardApi\Account\Entity;

class BattleTag
    {
    private $battleTag;

    public function __construct($battleTag)
        {
        if(!preg_match('/^[a-zA-Z]+#[0-9]{4}$/', $battleTag))
            {
            $msg = 'Invalid BattleTag %s!';
            throw new \InvalidArgumentException(sprintf($msg, $battleTag));
            }

        $this->battleTag = $battleTag;
        }

    public function getBattleTag()
        {
        return $this->battleTag;
        }
    }
