<?php
namespace Thunder\BlizzardApi\Tests\Entity\Diablo3;

use Thunder\BlizzardApi\Parser\Account\BattleTagParser;

class BattleTagParserTest extends \PHPUnit_Framework_TestCase
    {
    public function testInvalidBattleTagException()
        {
        $this->setExpectedException(\RuntimeException::class);
        $parser = new BattleTagParser();
        $parser->getResponse('{}');
        }
    }
