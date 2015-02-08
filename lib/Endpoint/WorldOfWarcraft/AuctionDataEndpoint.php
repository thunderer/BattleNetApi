<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Symfony\Component\Yaml\Exception\ParseException;
use Thunder\BlizzardApi\EndpointInterface;

class AuctionDataEndpoint implements EndpointInterface
    {
    private $realm;

    public function __construct($realm)
        {
        $this->realm = $realm;
        }

    public function getPath()
        {
        return '/wow/auction/data/'.$this->realm;
        }

    public function getResponse($response)
        {
        throw new ParseException('Not implemented yet!');
        }
    }
