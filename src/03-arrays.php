<?php
const KEY_TAGS = 'tags';
const KEY_NAME = 'name';
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param  array  $input
 * @return array
 */
function repeatArrayValues(array $input)
{
    $result = [];
    foreach ($input as $value) {
        for ($i = 0; $i < $value; $i++) {
            $result[] = $value;
        }
    }

    return $result;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param  array  $input
 * @return int
 */
function getUniqueValue(array $input)
{
    $uniq = [];
    foreach (array_count_values($input) as $key => $value) {
        if ($value == 1) {
            $uniq[] = $key;
        }
    }

    return $uniq ? min($uniq) : 0;
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param  array  $input
 * @return array
 */
function groupByTag(array $input)
{
    $result = [];
    foreach ($input as $item) {
        foreach ($item[KEY_TAGS] as $tag) {
            if (array_key_exists($tag, $result)) {
                $result[$tag][] = $item[KEY_NAME];
            } else {
                $result[$tag] = [$item[KEY_NAME]];
            }
        }
    }
    foreach ($result as $key => &$value) {
        sort($value);
    }

    return $result;
}
