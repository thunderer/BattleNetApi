<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Character;

class CharacterProfileEndpoint implements EndpointInterface
    {
    private $realm;
    private $name;
    private $fields;

    public function __construct($realm, $name, array $fields)
        {
        $this->realm = $realm;
        $this->name = $name;
        $this->fields = $fields;
        }

    public function getPath()
        {
        // FIXME: This won't play well with current Client implementation (query string)
        return '/wow/character/'.$this->realm.'/'.$this->name.'/?fields='.implode(',', $this->fields);
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return Character::create($json);
        }
    }
