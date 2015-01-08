<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Match
    {
    const RESULT_WIN = 1;
    const RESULT_LOSS = 2;

    const SPEED_FAST = 10;
    const SPEED_FASTER = 11;

    const TYPE_SOLO = 20;
    const TYPE_CUSTOM = 21;
    const TYPE_COOP = 22;
    const TYPE_TWOS = 23;

    private static $resultsAliases = array(
        self::RESULT_WIN => 'win',
        self::RESULT_LOSS => 'loss',
        );
    private static $speedsAliases = array(
        self::SPEED_FAST => 'fast',
        self::SPEED_FASTER => 'faster',
        );
    private static $typesAliases = array(
        self::TYPE_SOLO => 'solo',
        self::TYPE_CUSTOM => 'custom',
        self::TYPE_COOP => 'co_op',
        self::TYPE_TWOS => 'twos',
        );

    private $map;
    private $type;
    private $result;
    private $speed;
    private $date;

    function __construct($map, $type, $result, $speed, $date)
        {
        $this->map = $map;
        $this->setType($type);
        $this->setResult($result);
        $this->setSpeed($speed);
        $this->date = $date;
        }

    private function setType($type)
        {
        if(!array_key_exists($type, static::$typesAliases))
            {
            $msg = 'Invalid match type %s!';
            throw new \InvalidArgumentException(sprintf($msg, $type));
            }

        $this->type = $type;
        }

    private function setResult($result)
        {
        if(!array_key_exists($result, static::$resultsAliases))
            {
            $msg = 'Invalid match type %s!';
            throw new \InvalidArgumentException(sprintf($msg, $result));
            }

        $this->result = $result;
        }

    private function setSpeed($speed)
        {
        if(!array_key_exists($speed, static::$speedsAliases))
            {
            $msg = 'Invalid match type %s!';
            throw new \InvalidArgumentException(sprintf($msg, $speed));
            }

        $this->speed = $speed;
        }

    public static function getResultsAliases()
        {
        return static::$resultsAliases;
        }

    public static function getSpeedsAliases()
        {
        return static::$speedsAliases;
        }

    public static function getTypesAliases()
        {
        return static::$typesAliases;
        }

    public function getMap()
        {
        return $this->map;
        }

    public function getType()
        {
        return $this->type;
        }

    public function getResult()
        {
        return $this->result;
        }

    public function getSpeed()
        {
        return $this->speed;
        }

    public function getDate()
        {
        return $this->date;
        }
    }
