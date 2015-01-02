<?php
namespace Thunder\BlizzardApi\Tests\Entity\Diablo3;

use Thunder\BlizzardApi\Parser\Account\AccountIdParser;

class AccountIdParserTest extends \PHPUnit_Framework_TestCase
    {
    public function testInvalidAccountIdException()
        {
        $this->setExpectedException(\RuntimeException::class);
        $parser = new AccountIdParser();
        $parser->getResponse('{}');
        }
    }
