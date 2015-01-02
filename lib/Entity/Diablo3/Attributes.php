<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Attributes
    {
    private $primary;
    private $secondary;
    private $passive;

    public function __construct(array $primary, array $secondary, array $passive)
        {
        $this->primary = $primary;
        $this->secondary = $secondary;
        $this->passive = $passive;
        }

    public function getPrimary()
        {
        return $this->primary;
        }

    public function getSecondary()
        {
        return $this->secondary;
        }

    public function getPassive()
        {
        return $this->passive;
        }
    }
