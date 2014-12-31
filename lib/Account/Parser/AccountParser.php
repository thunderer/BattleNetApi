<?php
namespace Thunder\BlizzardApi\Account\Parser;

use Thunder\BlizzardApi\Account\Entity\Account;
use Thunder\BlizzardApi\Account\Response\AccountResponse;
use Thunder\BlizzardApi\ParserInterface;

class AccountParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        if(!array_key_exists('id', $json))
            {
            throw new \RuntimeException('Invalid account response, no account ID found!');
            }

        return new AccountResponse(new Account($json['id']));
        }
    }
