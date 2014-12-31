<?php
namespace Thunder\BlizzardApi\Entity\Diablo3;

class Artisan
    {
    private $slug;
    private $level;
    private $stepCurrent;
    private $stepMax;

    public function __construct($slug, $level, $stepCurrent, $stepMax)
        {
        $this->slug = $slug;
        $this->level = $level;
        $this->stepCurrent = $stepCurrent;
        $this->stepMax = $stepMax;
        }

    public function getSlug()
        {
        return $this->slug;
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
