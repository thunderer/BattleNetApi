<?php
namespace Thunder\BlizzardApi\Tests\Entity\Diablo3;

use Thunder\BlizzardApi\Entity\Account\Account;

class AccountTest extends \PHPUnit_Framework_TestCase
    {
    public function testInstance()
        {
        $this->assertInstanceOf(Account::class, new Account(124737523));
        }

    public function testInvalidAccountIdException()
        {
        $this->setExpectedException(\InvalidArgumentException::class);
        new Account('id');
        }
    }
