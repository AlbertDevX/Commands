<?php

namespace simplecommands;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerBreakEvent;
use pocketmine\event\player\PlayerBlockPlaceEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\player\Player;

class Events extends PluginBase implements Listener
{
    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $player->sendMessage(TF::GREEN . "¡Bienvenido a nuestro servidor, " . $player->getName() . "!");
        $this->getServer()->broadcastMessage(TF::GREEN . $player->getName() . " se ha unido al juego.");
    }

    public function onQuit(PlayerQuitEvent $event): void {
        $player = $event->getPlayer();
        $this->getServer()->broadcastMessage(TF::RED . $player->getName() . " se ha desconectado.");
    }

    public function onBreak(PlayerBreakEvent $event): void {
        $event->setCancelled(true);
        $player = $event->getPlayer();
        $player->sendMessage(TF::BOLD . TF::GRAY . "[" . TF::RESET . TF::YELLOW . "!" . TF::BOLD . TF::GRAY . "]" . TF::RESET . TF::RED . "No puedes romper bloques en este servidor.");
    }

    public function onPlace(PlayerBlockPlaceEvent $event): void {
        $event->setCancelled(true);
        $player = $event->getPlayer();
        $player->sendMessage(TF::BOLD . TF::GRAY . "[" . TF::RESET . TF::YELLOW . "!" . TF::BOLD . TF::GRAY . "]" . TF::RESET . TF::RED . "No puedes colocar bloques en este servidor.");
    }
}
