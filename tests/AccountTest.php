<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\Account\Entity\Account;
use Thunder\BlizzardApi\Account\Entity\BattleTag;

class AccountTest extends \PHPUnit_Framework_TestCase
    {
    public function testInstance()
        {
        $this->assertInstanceOf(Account::class, new Account(124737523));
        }

    public function testInvalidBattleTagException()
        {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Account('id');
        }
    }
