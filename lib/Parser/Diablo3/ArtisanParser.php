<?php
namespace Thunder\BlizzardApi\Parser\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Artisan;
use Thunder\BlizzardApi\ParserInterface;
use Thunder\BlizzardApi\Response\Diablo3\ArtisanResponse;

class ArtisanParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $artisan = new Artisan($json['slug'], $json['name'], $json['portrait'],
            null, null, null);

        return new ArtisanResponse($artisan);
        }
    }
