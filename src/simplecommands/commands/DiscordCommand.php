<?php

namespace simplecommands\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use pocketmine\player\Player;

class DiscordCommand extends Command {
    public function __construct() {
        parent::__construct("discord", "Get the Discord link", "/discord");
        $this->setPermission("discord.cmd");
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        if (!$sender->hasPermission("discord.cmd")) {
            $sender->sendMessage(TF::RED . "No tienes los permisos necesarios para ejecutar este comando!");
            return false;
        }

        if (!$sender instanceof Player) {
            $sender->sendMessage(TF::RED . "Este comando solo puede ser usado in-game");
            return false;
        }

        $sender->sendMessage(TF::GREEN . "Join our Discord: https://discord.gg/VZuQwBjcV2");
        return true;
    }
}
