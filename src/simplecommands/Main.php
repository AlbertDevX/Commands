<?php

namespace simplecommands;

use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use simplecommands\commands\{
  AlertCommand, DiscordCommand
};
class Main extends PluginBase
{
  public static $prefix = TF::colorize("&c&lSimpleCommands");

  public function onEnable(): void
  {
    $this->getServer()->getLogger()->info(self::$prefix . " has been enabled");
    $this->CommandLogger();
  }

  public function onDisable(): void
  {
    $this->getServer()->getLogger()->info(self::$prefix . " has been disabled");
  }

  public function CommandLogger(): void
  {
    $this->getServer()->getCommandMap()->register("discord", new DiscordCommand());
    $this->getServer()->getCommandMap()->register("alert", new AlertCommand());
  }
}
