<?php
namespace Thunder\BlizzardApi\Request\Diablo3;

use Thunder\BlizzardApi\Parser\Diablo3\FollowerParser;
use Thunder\BlizzardApi\RequestInterface;

class FollowerRequest implements RequestInterface
    {
    private $follower;

    public function __construct($follower)
        {
        $this->follower = $follower;
        }

    public function getPath()
        {
        return '/d3/data/follower/'.$this->follower;
        }

    public function getParser()
        {
        return new FollowerParser();
        }
    }
