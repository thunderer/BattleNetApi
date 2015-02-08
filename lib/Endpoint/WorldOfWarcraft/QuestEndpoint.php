<?php
namespace Thunder\BlizzardApi\Endpoint\WorldOfWarcraft;

use Thunder\BlizzardApi\EndpointInterface;
use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Quest;

class QuestEndpoint implements EndpointInterface
    {
    private $quest;

    public function __construct($quest)
        {
        $this->quest = $quest;
        }

    public function getPath()
        {
        return '/wow/quest/'.$this->quest;
        }

    public function getResponse($response)
        {
        $json = json_decode($response, true);

        return new Quest(
            $json['id'],
            $json['title'],
            $json['reqLevel'],
            $json['suggestedPartyMembers'],
            $json['category'],
            $json['level']);
        }
    }
