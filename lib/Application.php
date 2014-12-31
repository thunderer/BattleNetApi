<?php
namespace Thunder\BlizzardApi;

/**
 * Value object to store application data obtained from BattleNet developer website.
 */
final class Application
    {
    private $name;
    private $key;
    private $secret;

    public function __construct($name, $key, $secret)
        {
        $this->name = $name;
        $this->key = $key;
        $this->secret = $secret;
        }

    public function getName()
        {
        return $this->name;
        }

    public function getKey()
        {
        return $this->key;
        }

    public function getSecret()
        {
        return $this->secret;
        }
    }
