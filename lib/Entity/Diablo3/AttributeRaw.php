<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class AttributeRaw
    {
    private $min;
    private $max;

    function __construct($min, $max)
        {
        $this->min = $min;
        $this->max = $max;
        }

    public function getMin()
        {
        return $this->min;
        }

    public function getMax()
        {
        return $this->max;
        }
    }
