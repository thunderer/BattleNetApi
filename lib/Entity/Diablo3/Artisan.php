<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Artisan
    {
    private $slug;
    private $name;
    private $portrait;
    private $level;
    private $stepCurrent;
    private $stepMax;

    public function __construct($slug, $name, $portrait, $level, $stepCurrent, $stepMax)
        {
        $this->slug = $slug;
        $this->name = $name;
        $this->portrait = $portrait;
        $this->level = $level;
        $this->stepCurrent = $stepCurrent;
        $this->stepMax = $stepMax;
        }

    public function getSlug()
        {
        return $this->slug;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getPortrait()
        {
        return $this->portrait;
        }

    public function getLevel()
        {
        return $this->level;
        }

    public function getStepCurrent()
        {
        return $this->stepCurrent;
        }

    public function getStepMax()
        {
        return $this->stepMax;
        }
    }
