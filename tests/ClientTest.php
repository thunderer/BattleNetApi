<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\Entity\Account\BattleTag;
use Thunder\BlizzardApi\Request\Account\AccountIdRequest;
use Thunder\BlizzardApi\Request\Account\BattleTagRequest;
use Thunder\BlizzardApi\Request\Diablo3\CareerRequest;
use Thunder\BlizzardApi\Response\Account\AccountIdResponse;
use Thunder\BlizzardApi\Response\Account\BattleTagResponse;
use Thunder\BlizzardApi\Application;
use Thunder\BlizzardApi\Client;
use Thunder\BlizzardApi\Connector\MockConnector;
use Thunder\BlizzardApi\RequestInterface;
use Thunder\BlizzardApi\Response\Diablo3\CareerResponse;

class ClientTest extends \PHPUnit_Framework_TestCase
    {
    /**
     * @param RequestInterface $request Request object to process
     * @param callable $tests Tests to perform on response object
     * @param string $fixture Raw response file
     *
     * @dataProvider provideApis
     */
    public function testApis(RequestInterface $request, callable $tests, $fixture)
        {
        $rawResponse = file_get_contents(__DIR__.'/fixtures/'.$fixture);
        $app = new Application('name', 'key', 'secret');
        $client = new Client($app, Client::REGION_EUROPE, 'en_GB', new MockConnector($rawResponse));
        $tests($client->getResponse($request));
        }

    public function provideApis()
        {
        return array(
            array(new AccountIdRequest(), function(AccountIdResponse $response) {
                $this->assertEquals(124737523, $response->getAccount()->getId());
                }, 'account/account-id.json'),
            array(new BattleTagRequest(), function(BattleTagResponse $response) {
                $this->assertEquals('Thunderer#1926', $response->getBattleTag()->getBattleTag());
                }, 'account/battle-tag.json'),
            array(new CareerRequest(new BattleTag('Thunderer#1926')), function(CareerResponse $response) {
                $this->assertEquals('Thunderer#1926', $response->getCareer()->getBattleTag()->getBattleTag());
                }, 'diablo3/career.json'),
            );
        }
    }
