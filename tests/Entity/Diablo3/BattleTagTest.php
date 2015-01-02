<?php
namespace Thunder\BlizzardApi\Tests\Entity\Diablo3;

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
