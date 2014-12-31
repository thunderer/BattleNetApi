<?php
namespace Thunder\BlizzardApi\Parser\Account;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Response\Account\BattleTagResponse;
use Thunder\BlizzardApi\ParserInterface;

class BattleTagParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        if(!array_key_exists('battletag', $json))
            {
            throw new \RuntimeException('Invalid BattleTag response, no BattleTag found!');
            }

        return new BattleTagResponse(new BattleTag($json['battletag']));
        }
    }
