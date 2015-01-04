<?php
namespace Thunder\BlizzardApi\Tests\Endpoint\Account;

use Thunder\BlizzardApi\Endpoint\Account\AccountIdEndpoint;

class AccountIdEndpointTest extends \PHPUnit_Framework_TestCase
    {
    public function testInvalidAccountIdException()
        {
        $this->setExpectedException(\RuntimeException::class);
        $parser = new AccountIdEndpoint();
        $parser->getResponse('{}');
        }
    }
