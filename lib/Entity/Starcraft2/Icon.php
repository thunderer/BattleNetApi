<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Icon
    {
    private $x;
    private $y;
    private $width;
    private $height;
    private $offset;
    private $url;

    function __construct($x, $y, $width, $height, $offset, $url)
        {
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
        $this->offset = $offset;
        $this->url = $url;
        }

    public function getX()
        {
        return $this->x;
        }

    public function getY()
        {
        return $this->y;
        }

    public function getWidth()
        {
        return $this->width;
        }

    public function getHeight()
        {
        return $this->height;
        }

    public function getOffset()
        {
        return $this->offset;
        }

    public function getUrl()
        {
        return $this->url;
        }
    }
