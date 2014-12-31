<?php
namespace Thunder\BlizzardApi\Account\Request;

use Thunder\BlizzardApi\Account\Parser\BattleTagParser;
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
