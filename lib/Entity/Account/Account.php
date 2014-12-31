<?php
namespace Thunder\BlizzardApi\Entity\Account;

class Account
    {
    private $id;

    public function __construct($id)
        {
        if(!is_int($id))
            {
            throw new \InvalidArgumentException('Account ID must be an integer!');
            }

        $this->id = $id;
        }

    public function getId()
        {
        return $this->id;
        }
    }
