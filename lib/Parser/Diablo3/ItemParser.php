<?php
namespace Thunder\BlizzardApi\Parser\Diablo3;

use Thunder\BlizzardApi\Entity\Diablo3\Attribute;
use Thunder\BlizzardApi\Entity\Diablo3\AttributeRaw;
use Thunder\BlizzardApi\Entity\Diablo3\Attributes;
use Thunder\BlizzardApi\Entity\Diablo3\Item;
use Thunder\BlizzardApi\ParserInterface;
use Thunder\BlizzardApi\Response\Diablo3\ItemResponse;

class ItemParser implements ParserInterface
    {
    public function getResponse($response)
        {
        $json = json_decode($response, true);

        $attributeFn = function(array $data) {
            return new Attribute($data['text'], $data['color'], $data['affixType']);
            };
        $attributes = new Attributes(
            array_map($attributeFn, $json['attributes']['primary']),
            array_map($attributeFn, $json['attributes']['secondary']),
            array_map($attributeFn, $json['attributes']['passive']));

        $attributesRaw = array_map(function(array $data) {
            return new AttributeRaw($data['min'], $data['max']);
            }, $json['attributesRaw']);

        $item = new Item(
            $json['id'],
            $json['name'],
            $json['icon'],
            $json['displayColor'],
            $json['tooltipParams'],
            $json['itemLevel'],
            $json['requiredLevel'],
            $attributes,
            $attributesRaw,
            array()); // FIXME: Item gems are not parsed yet!

        return new ItemResponse($item);
        }
    }
