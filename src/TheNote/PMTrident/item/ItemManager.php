<?php

declare(strict_types = 1);

namespace TheNote\PMTrident\item;

use TheNote\PMTrident\item\Trident;
use TheNote\PMTrident\item\ExtraVanillaItems;
use pocketmine\item\ItemIdentifier;
use pocketmine\data\bedrock\item\SavedItemData;
use pocketmine\item\ItemTypeIds as ItemIds;
use pocketmine\item\StringToItemParser;
use pocketmine\world\format\io\GlobalItemDataHandlers;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\inventory\CreativeInventory;

class ItemManager {
    public static function init(): void
    {
        $itemDeserializer = GlobalItemDataHandlers::getDeserializer();
        $itemSerializer = GlobalItemDataHandlers::getSerializer();
        $creativeInventory = CreativeInventory::getInstance();
        $stringToItemParser = StringToItemParser::getInstance();

        $trident = ExtraVanillaItems::TRIDENT();
        $itemDeserializer->map(ItemTypeNames::TRIDENT, static fn() => clone $trident);
        $itemSerializer->map($trident, static fn() => new SavedItemData(ItemTypeNames::TRIDENT));
        $creativeInventory->add($trident);
        $stringToItemParser->register("trident", static fn() => clone $trident);
        //ItemFactory::getInstance()->register(new Trident(new ItemIdentifier(ItemIds::TRIDENT, 0), "Trident"));
    }
}
