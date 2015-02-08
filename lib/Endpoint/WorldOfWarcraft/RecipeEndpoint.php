<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Recipe;

class RecipeEndpoint implements EndpointInterface
    {
    private $recipe;

    public function __construct($recipe)
        {
        $this->recipe = $recipe;
        }

    public function getPath()
        {
        return '/wow/recipe/'.$this->recipe;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return new Recipe($json['id'], $json['name'], $json['profession'], $json['icon']);
        }
    }
