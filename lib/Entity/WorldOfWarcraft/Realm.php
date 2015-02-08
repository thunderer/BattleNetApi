<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft;

class Realm
    {
    private $name;
    private $slug;
    private $type;
    private $population;
    private $queue;
    private $status;
    private $battlegroup;
    private $locale;
    private $timezone;
    private $connectedRealms = array();

    // private $wintergrasp;
    // private $tolbarad;

    function __construct($name, $slug, $type, $population, $queue, $status,
                         $battlegroup, $locale, $timezone, array $connectedRealms)
        {
        $this->name = $name;
        $this->slug = $slug;
        $this->type = $type;
        $this->population = $population;
        $this->queue = $queue;
        $this->status = $status;
        $this->battlegroup = $battlegroup;
        $this->locale = $locale;
        $this->timezone = $timezone;
        $this->connectedRealms = $connectedRealms;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getSlug()
        {
        return $this->slug;
        }

    public function getType()
        {
        return $this->type;
        }

    public function getPopulation()
        {
        return $this->population;
        }

    public function getQueue()
        {
        return $this->queue;
        }

    public function getStatus()
        {
        return $this->status;
        }

    public function getBattlegroup()
        {
        return $this->battlegroup;
        }

    public function getLocale()
        {
        return $this->locale;
        }

    public function getTimezone()
        {
        return $this->timezone;
        }

    public function getConnectedRealms()
        {
        return $this->connectedRealms;
        }
    }
