<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

class ClassTalents
    {
    private $class;
    private $glyphs;
    private $specs;
    private $talents;
    private $petSpecs;

    function __construct($class, array $glyphs, array $specs, array $talents, array $petSpecs)
        {
        $this->class = $class;
        $this->glyphs = $glyphs;
        $this->specs = $specs;
        $this->talents = $talents;
        $this->petSpecs = $petSpecs;
        }

    public function getClass()
        {
        return $this->class;
        }

    public function getGlyphs()
        {
        return $this->glyphs;
        }

    public function getSpecs()
        {
        return $this->specs;
        }

    public function getTalents()
        {
        return $this->talents;
        }

    public function getPetSpecs()
        {
        return $this->petSpecs;
        }
    }
