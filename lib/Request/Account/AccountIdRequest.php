<?php
namespace Thunder\BlizzardApi\Request\Account;

use Thunder\BlizzardApi\Parser\Account\AccountIdParser;
use Thunder\BlizzardApi\RequestInterface;

class AccountIdRequest implements RequestInterface
    {
    public function getPath()
        {
        return '/account/user/id';
        }

    public function getParser()
        {
        return new AccountIdParser();
        }
    }
