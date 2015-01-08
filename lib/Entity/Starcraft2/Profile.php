<?php
namespace Thunder\BlizzardApi\Entity\Starcraft2;

class Profile
    {
    private $id;
    private $realm;
    private $displayName;
    private $clanName;
    private $clanTag;
    private $profilePath;
    private $portrait;

    private $career;
    private $swarmLevelTotal;
    private $swarmLevels;
    private $campaign;
    // private $season;

    private $selectedRewards;
    private $earnedRewards;

    private $totalAchievementsPoints;
    private $achievementsPointsByCategory;
    private $achievements;

    function __construct($id, $realm, $displayName, $clanName, $clanTag,
                         $profilePath, Icon $portrait = null, Career $career = null,
                         $swarmLevelTotal, array $swarmLevels, $campaign,
                         array $selectedRewards, array $earnedRewards,
                         $totalAchievementsPoints, array $achievementsPointsByCategory,
                         array $achievements)
        {
        $this->id = $id;
        $this->realm = $realm;
        $this->displayName = $displayName;
        $this->clanName = $clanName;
        $this->clanTag = $clanTag;
        $this->profilePath = $profilePath;
        $this->portrait = $portrait;
        $this->career = $career;
        $this->swarmLevelTotal = $swarmLevelTotal;
        $this->swarmLevels = $swarmLevels;
        $this->campaign = $campaign;
        $this->selectedRewards = $selectedRewards;
        $this->earnedRewards = $earnedRewards;
        $this->totalAchievementsPoints = $totalAchievementsPoints;
        $this->achievementsPointsByCategory = $achievementsPointsByCategory;
        $this->achievements = $achievements;
        }

    public function getId()
        {
        return $this->id;
        }

    public function getRealm()
        {
        return $this->realm;
        }

    public function getDisplayName()
        {
        return $this->displayName;
        }

    public function getClanName()
        {
        return $this->clanName;
        }

    public function getClanTag()
        {
        return $this->clanTag;
        }

    public function getProfilePath()
        {
        return $this->profilePath;
        }

    public function getPortrait()
        {
        return $this->portrait;
        }

    public function getCareer()
        {
        return $this->career;
        }

    public function getSwarmLevelTotal()
        {
        return $this->swarmLevelTotal;
        }

    public function getSwarmLevels()
        {
        return $this->swarmLevels;
        }

    public function getCampaign()
        {
        return $this->campaign;
        }

    public function getSelectedRewards()
        {
        return $this->selectedRewards;
        }

    public function getEarnedRewards()
        {
        return $this->earnedRewards;
        }

    public function getTotalAchievementsPoints()
        {
        return $this->totalAchievementsPoints;
        }

    public function getAchievementsPointsByCategory()
        {
        return $this->achievementsPointsByCategory;
        }

    public function getAchievements()
        {
        return $this->achievements;
        }
    }
