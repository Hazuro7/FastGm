<?php

namespace FastGm;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->getLogger()->info(TextFormat::GREEN . "FastGm's plugin has been enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED . "Cette commande ne peut être utilisée que par un joueur.");
            return false;
        }

        switch ($command->getName()) {
            case "gm1":
                $sender->setGamemode(GameMode::CREATIVE());
                $sender->sendMessage(TextFormat::GREEN . "Vous avez changé votre mode de jeu en Créatif !");
                break;
            case "gm0":
                $sender->setGamemode(GameMode::SURVIVAL());
                $sender->sendMessage(TextFormat::GREEN . "Vous avez changé votre mode de jeu en Survie !");
                break;
            case "gm3":
                $sender->setGamemode(GameMode::SPECTATOR());
                $sender->sendMessage(TextFormat::GREEN . "Vous avez changé votre mode de jeu en Spectateur !");
                break;
            default:
                return false;
        }

        return true;
    }
}
