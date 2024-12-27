<?php

namespace simplecommands\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use simplecommands\Main;

class AlertCommand extends Command {
    public function __construct() {
        parent::__construct("alert", "Send an alert message", "/alert <message>");
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        if (count($args) < 1) {
            $sender->sendMessage(TF::RED . "Usage: /alert <message>");
            return false;
        }

        $message = implode(" ", $args);
        $sender->getServer()->broadcastMessage(TF::colorize("&8[&c&lALERT&8]&r&e " . $message));
        return true;
    }
}
