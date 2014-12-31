<?php
namespace Thunder\BlizzardApi\Parser\Account;

use Thunder\BlizzardApi\Entity\Account\Account;
use Thunder\BlizzardApi\Response\Account\AccountIdResponse;
use Thunder\BlizzardApi\ParserInterface;

class AccountIdParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        if(!array_key_exists('id', $json))
            {
            throw new \RuntimeException('Invalid account response, no account ID found!');
            }

        return new AccountIdResponse(new Account($json['id']));
        }
    }
