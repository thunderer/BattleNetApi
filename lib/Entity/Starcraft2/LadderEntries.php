<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class LadderEntries
    {
    private $entries;

    function __construct($entries)
        {
        $this->entries = $entries;
        }

    public function getEntries()
        {
        return $this->entries;
        }
    }
