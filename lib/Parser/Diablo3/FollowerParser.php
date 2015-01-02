<?php
namespace Thunder\BlizzardApi\Parser\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Follower;
use Thunder\BlizzardApi\Entity\Diablo3\Skill;
use Thunder\BlizzardApi\Entity\Diablo3\Skills;
use Thunder\BlizzardApi\ParserInterface;
use Thunder\BlizzardApi\Response\Diablo3\FollowerResponse;

class FollowerParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $skillFn = function(array $data) {
            return new Skill($data['slug'], $data['name'], $data['icon'],
                $data['level'], null, $data['tooltipUrl'], $data['description'],
                $data['simpleDescription'], $data['skillCalcId'], null);
            };
        $skills = new Skills(
            array_map($skillFn, $json['skills']['active']),
            array_map($skillFn, $json['skills']['passive']));

        $follower = new Follower($json['slug'], $json['name'], $json['realName'],
            $json['portrait'], $skills);

        return new FollowerResponse($follower);
        }
    }
