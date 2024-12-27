<?php

namespace simplecommands\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as TF;
use simplecommands\Main;

class DiscordCommand extends Command {
    public function __construct() {
        parent::__construct("discord", "Get the Discord link", "/discord");
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
        $sender->sendMessage(TF::GREEN . "Join our Discord: https://discord.gg/VZuQwBjcV2");
        return true;
    }
}
