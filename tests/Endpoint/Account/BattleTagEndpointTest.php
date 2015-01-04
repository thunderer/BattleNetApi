<?php
namespace Thunder\BlizzardApi\Tests\Endpoint\Account;

use Thunder\BlizzardApi\Endpoint\Account\BattleTagEndpoint;

class BattleTagEndpointTest extends \PHPUnit_Framework_TestCase
    {
    public function testInvalidBattleTagException()
        {
        $this->setExpectedException(\RuntimeException::class);
        $parser = new BattleTagEndpoint();
        $parser->getResponse('{}');
        }
    }
