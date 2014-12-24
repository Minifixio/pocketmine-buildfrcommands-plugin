<?php

namespace Minifixio\buildfr;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\event\entity\EntityDeathEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
        
use pocketmine\event\player\PlayerJoinEvent;

class BuildFR extends PluginBase  implements Listener{
	
    public function onEnable(){
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
    	$this->logOnConsole(" ");
    	
    	$this->command = new BuildfrCommands($this);
    	$this->getServer()->getCommandMap()->register("minifixio", $this->command);
	}
    
    public function onDisable() {
 
    }
    
    public function onPlayerJoin(PlayerJoinEvent $joinEvent){
    	$onlinePlayers = count($this->getServer()->getOnlinePlayers());
    	$maxPlayers = $this->getServer()->getMaxPlayers();
    	$player = $joinEvent->getPlayer();
    	$player->sendMessage(">---------------------<");
    	$player->sendMessage("- Bienvenue sur BuildFR , pour plus d'informations, tape : /buildfr!");
        $player->sendMessage("- Il y a sur le serveur : " . $onlinePlayers . "/" . $maxPlayers . " joueurs");
        $player->sendMessage(">---------------------<");
    }
    
     
    
    private function logOnConsole($message){
    	$this->getServer()->broadcastMessage($message);
    }

}