<?php
namespace Thunder\BlizzardApi\Request\Account;

use Thunder\BlizzardApi\Parser\Account\BattleTagParser;
use Thunder\BlizzardApi\RequestInterface;

class BattleTagRequest implements RequestInterface
    {
    public function getPath()
        {
        return '/account/user/battletag';
        }

    public function getParser()
        {
        return new BattleTagParser();
        }
    }
