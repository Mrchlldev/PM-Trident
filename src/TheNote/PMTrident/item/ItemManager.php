<?php

declare(strict_types = 1);

namespace TheNote\PMTrident\item;

use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds as ItemIds;
use pocketmine\item\StringToItemParser;
use pocketmine\world\format\io\GlobalItemDataHandlers;

class ItemManager {
    public static function init(): void
    {
        ItemFactory::getInstance()->register(new Trident(new ItemIdentifier(ItemIds::TRIDENT, 0), "Trident"));
    }
}
