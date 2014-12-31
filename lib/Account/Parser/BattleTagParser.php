<?php
namespace Thunder\BlizzardApi\Account\Parser;

use Thunder\BlizzardApi\Account\Entity\BattleTag;
use Thunder\BlizzardApi\Account\Response\BattleTagResponse;
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
