<?php
namespace Thunder\BlizzardApi\Endpoint\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Artisan;
use Thunder\BlizzardApi\EndpointInterface;

class ArtisanEndpoint implements EndpointInterface
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

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $artisan = new Artisan($json['slug'], $json['name'], $json['portrait'],
            null, null, null);

        return $artisan;
        }
    }
