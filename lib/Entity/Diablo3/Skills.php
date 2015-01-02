<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Skills
    {
    private $active;
    private $passive;

    function __construct(array $active, array $passive)
        {
        $this->active = $active;
        $this->passive = $passive;
        }

    public function getActive()
        {
        return $this->active;
        }

    public function getPassive()
        {
        return $this->passive;
        }
    }
