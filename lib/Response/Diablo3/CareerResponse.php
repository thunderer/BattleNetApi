<?php
namespace Thunder\BlizzardApi\Response\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Career;
use Thunder\BlizzardApi\ResponseInterface;

class CareerResponse implements ResponseInterface
    {
    private $career;

    public function __construct(Career $career)
        {
        $this->career = $career;
        }

    public function getCareer()
        {
        return $this->career;
        }
    }
