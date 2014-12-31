<?php
namespace Thunder\BlizzardApi\Diablo3\Entity;

class Quest
    {
    private $name;
    private $slug;

    public function __construct($name, $slug)
        {
        $this->name = $name;
        $this->slug = $slug;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getSlug()
        {
        return $this->slug;
        }
    }
