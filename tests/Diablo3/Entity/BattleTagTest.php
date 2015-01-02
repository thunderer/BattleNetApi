<?php
namespace Thunder\BlizzardApi\Tests\Diablo3\Entity;

use Thunder\BlizzardApi\Entity\Account\BattleTag;

class BattleTagTest extends \PHPUnit_Framework_TestCase
    {
    public function testInstance()
        {
        $this->assertInstanceOf(BattleTag::class, new BattleTag('Thunderer#1926'));
        }

    public function testInvalidAccountIdException()
        {
        $this->setExpectedException(\InvalidArgumentException::class);
        new BattleTag('tag');
        }
    }
