<?php
namespace Thunder\BlizzardApi\Account\Response;

use Thunder\BlizzardApi\Account\Entity\Account;
use Thunder\BlizzardApi\ResponseInterface;

class AccountResponse implements ResponseInterface
    {
    private $account;

    public function __construct(Account $account)
        {
        $this->account = $account;
        }

    public function getAccount()
        {
        return $this->account;
        }
    }
