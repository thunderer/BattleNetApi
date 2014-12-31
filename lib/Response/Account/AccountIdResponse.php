<?php
namespace Thunder\BlizzardApi\Response\Account;

use Thunder\BlizzardApi\Entity\Account\Account;
use Thunder\BlizzardApi\ResponseInterface;

class AccountIdResponse implements ResponseInterface
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
