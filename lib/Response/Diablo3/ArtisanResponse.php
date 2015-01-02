<?php
namespace Thunder\BlizzardApi\Response\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Artisan;
use Thunder\BlizzardApi\ResponseInterface;

class ArtisanResponse implements ResponseInterface
    {
    private $artisan;

    public function __construct(Artisan $artisan)
        {
        $this->artisan = $artisan;
        }

    public function getArtisan()
        {
        return $this->artisan;
        }
    }
