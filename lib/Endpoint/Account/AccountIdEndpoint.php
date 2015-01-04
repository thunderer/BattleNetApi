<?php
namespace Thunder\BlizzardApi\Endpoint\Account;

use Thunder\BlizzardApi\Entity\Account\Account;
use Thunder\BlizzardApi\EndpointInterface;

class AccountIdEndpoint implements EndpointInterface
    {
    public function getPath()
        {
        return '/account/user/id';
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        if(!array_key_exists('id', $json))
            {
            throw new \RuntimeException('Invalid account response, no account ID found!');
            }

        return new Account($json['id']);
        }
    }
