<?php
namespace Thunder\BlizzardApi\Endpoint\Account;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\EndpointInterface;

class BattleTagEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/account/user/battletag';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        if(!array_key_exists('battletag', $json))
            {
            throw new \RuntimeException('Invalid BattleTag response, no BattleTag found!');
            }

        return new BattleTag($json['battletag']);
        }
    }
