<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Follower
    {
    private $slug;
    private $name;
    private $realName;
    private $portrait;
    private $skills;

    public function __construct($slug, $name, $realName, $portrait, Skills $skills)
        {
        $this->slug = $slug;
        $this->name = $name;
        $this->realName = $realName;
        $this->portrait = $portrait;
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

    public function getPortrait()
        {
        return $this->portrait;
        }

    public function getSkills()
        {
        return $this->skills;
        }
    }
