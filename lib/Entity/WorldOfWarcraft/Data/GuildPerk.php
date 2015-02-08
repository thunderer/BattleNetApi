<?php
namespace Thunder\BlizzardApi\Entity\WorldOfWarcraft\Data;

use Thunder\BlizzardApi\Entity\WorldOfWarcraft\Spell;

class GuildPerk
    {
    private $guildLevel;
    private $spell;

    function __construct($guildLevel, Spell $spell)
        {
        $this->guildLevel = $guildLevel;
        $this->spell = $spell;
        }

    public function getGuildLevel()
        {
        return $this->guildLevel;
        }

    public function getSpell()
        {
        return $this->spell;
        }
    }
