<?php
namespace Thunder\BlizzardApi\Response\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Follower;
use Thunder\BlizzardApi\ResponseInterface;

class FollowerResponse implements ResponseInterface
    {
    private $follower;

    public function __construct(Follower $follower)
        {
        $this->follower = $follower;
        }

    public function getFollower()
        {
        return $this->follower;
        }
    }
