<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\Account\Request\AccountRequest;
use Thunder\BlizzardApi\Account\Request\BattleTagRequest;
use Thunder\BlizzardApi\Account\Response\AccountResponse;
use Thunder\BlizzardApi\Account\Response\BattleTagResponse;
use Thunder\BlizzardApi\Application;
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\Connector\MockConnector;
use Thunder\BlizzardApi\RequestInterface;

class ClientTest extends \PHPUnit_Framework_TestCase
    {
    /**
     * @param string $fixture Raw response file
     * @param RequestInterface $request Request object to process
     * @param callable $tests Tests to perform on response object
     *
     * @dataProvider provideApis
     */
    public function testApis($fixture, RequestInterface $request, callable $tests)
        {
        $rawResponse = file_get_contents(__DIR__.'/fixtures/'.$fixture);
        $app = new Application('name', 'key', 'secret');
        $client = new Client($app, Client::REGION_EUROPE, 'en_GB', new MockConnector($rawResponse));
        $tests($client->getResponse($request));
        }

    public function provideApis()
        {
        return array(
            array('account/account-id.json', new AccountRequest(), function(AccountResponse $response) {
                $this->assertEquals(124737523, $response->getAccount()->getId());
                }),
            array('account/battle-tag.json', new BattleTagRequest(), function(BattleTagResponse $response) {
                $this->assertEquals('Thunderer#1926', $response->getBattleTag()->getBattleTag());
                }),
            );
        }
    }
