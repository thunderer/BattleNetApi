<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Attribute
    {
    private $text;
    private $color;
    private $type;

    public function __construct($text, $color, $type)
        {
        $this->text = $text;
        $this->color = $color;
        $this->type = $type;
        }

    public function getText()
        {
        return $this->text;
        }

    public function getType()
        {
        return $this->type;
        }

    public function getColor()
        {
        return $this->color;
        }
    }
