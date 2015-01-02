<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Follower
    {
    private $slug;
    private $name;
    private $realName;
    private $skills;

    public function __construct($slug, $name, $realName, array $skills)
        {
        $this->slug = $slug;
        $this->name = $name;
        $this->realName = $realName;
        $this->skills = $skills;
        }

    public function getSlug()
        {
        return $this->slug;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getRealName()
        {
        return $this->realName;
        }

    public function getSkills()
        {
        return $this->skills;
        }
    }
