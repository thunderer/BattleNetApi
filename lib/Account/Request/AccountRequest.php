<?php
namespace Thunder\BlizzardApi\Account\Request;

use Thunder\BlizzardApi\Account\Parser\AccountParser;
use Thunder\BlizzardApi\RequestInterface;

class AccountRequest implements RequestInterface
    {
    public function __construct()
        {
        }

    public function getPath()
        {
        return '/account/user/id';
        }

    public function getParser()
        {
        return new AccountParser();
        }
    }
