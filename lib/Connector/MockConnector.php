<?php
namespace Thunder\BlizzardApi\Connector;

use Thunder\BlizzardApi\ConnectorInterface;

class MockConnector implements ConnectorInterface
    {
    private $response;

    public function __construct($response)
        {
        $this->response = $response;
        }

    public function getResponse($url)
        {
        return $this->response;
        }
    }
