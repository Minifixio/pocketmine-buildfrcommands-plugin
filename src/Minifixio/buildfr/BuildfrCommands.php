<?php

namespace Minifixio\buildfr;

use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\command\CommandSender;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\Server;

class BuildfrCommands extends Command implements PluginIdentifiableCommand{

	private $plugin;
	private $commandName = "buildfr";
	private $command;

    public function __construct(Buildfr $plugin){
	   parent::__construct($this->commandName, "Tapez cette commande pour savoir toutes les informations necessaires a votre visite sur buildfr !");
	   $this->setUsage("/$this->commandName");
	   $this->plugin = $plugin;
	   $this->command = $this->commandName;
	}

    public function getPlugin(){
	   return $this->plugin;
	}

    public function execute(CommandSender $sender, $label, array $params){
	   if(!$this->plugin->isEnabled()){
		  return false;
		}

	   if(!$sender instanceof Player){
		  $sender->sendMessage("Utiliser la commande dans le jeu");
		  return true;
		}
		$onlinePlayers = $this->plugin->getServer()->getOnlinePlayers();
		$playerNames = "";
		foreach ($onlinePlayers as $player){
			$playerNames = $playerNames . " / " . $player->getName();
		}
		
		$sender->sendMessage(" ");
		$sender->sendMessage("=======>BUILDFR<=======");
		$sender->sendMessage("Bienvenue sur BuildFR !");
		$sender->sendMessage("Il y a sur le serveur : " . $playerNames);
		$sender->sendMessage("=======================");
		$sender->sendMessage("Sur BuildFR il y a :");
		$sender->sendMessage("- Du PvP , du jump , du build et du fun !!");
		$sender->sendMessage("=======================");
		$sender->sendMessage("> Pour te teleporter dans des mondes , tape sur les panneaux!");
		$sender->sendMessage("> Pour te stuffer , tape sur les panneaux au spawn sous les blocks! ");
		$sender->sendMessage("=======>BON JEU<=======");
		$sender->sendMessage(" ");
		return true;
    }
}