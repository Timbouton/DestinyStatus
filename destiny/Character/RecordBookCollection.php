<?php

namespace Destiny\Character;

use Destiny\Character;
use Destiny\Collection;

/**
 * @method \Destiny\Character\RecordBookCollection offsetGet($key)
 */
class RecordBookCollection extends Collection
{
    const SRL_RECORD_BOOK = '0';
    const TRIUMPH_Y2 = '2175864601';
    const COMPETITIVE_SPIRIT = '2225855327';
    const RISE_OF_IRON = '3433868304';

    public function __construct(Character $character, array $properties)
    {
        if (!isset($properties['recordBooks'])) {
            return;
        }

        foreach ($properties['recordBooks'] as $properties) {
            $recordBook = new RecordBook($character, $properties);
            $this->put($recordBook->bookHash, $recordBook);
        }

        $this->items = array_sort($this->items, function ($item) {
            return $item['itemHash'];
        });
    }
}
