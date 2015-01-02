<?php
namespace Thunder\BlizzardApi\Request\Diablo3;

use Thunder\BlizzardApi\Parser\Diablo3\ArtisanParser;
use Thunder\BlizzardApi\RequestInterface;

class ArtisanRequest implements RequestInterface
    {
    private $artisan;

    public function __construct($artisan)
        {
        $this->artisan = $artisan;
        }

    public function getPath()
        {
        return '/d3/data/artisan/'.$this->artisan;
        }

    public function getParser()
        {
        return new ArtisanParser();
        }
    }
