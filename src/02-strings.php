<?php
/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param  string  $input
 * @return string
 */
function snakeCaseToCamelCase(string $input)
{
    if (empty($input)) {
        throw new InvalidArgumentException("The input can't be an empty");
    }

    $words = explode('_', $input);
    $response = strtolower($words[0]);
    for ($i = 1; $i < count($words); $i++) {
        $response .= ucfirst($words[$i]);
    }

    return $response;
}

/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param  string  $input
 * @return string
 */
function mirrorMultibyteString(string $input)
{
    if (empty($input)) {
        throw new InvalidArgumentException("The input can't be an empty");
    }

    $result = [];
    foreach(explode(' ', $input) as $word) {
        $result[] = mbStringReverse($word);
    }

    return implode(' ', $result);
}

/**
 * @param string $word
 * @return string
 */
function mbStringReverse(string $word): string
{
    $reversed = '';
    for ($i = mb_strlen($word); $i >= 0; $i--) {
        $reversed .= mb_substr($word, $i, 1);
    }

    return $reversed;
}

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param  string  $noun
 * @return string
 */
function getBrandName(string $noun)
{
    if (empty($noun)) {
        throw new InvalidArgumentException("The noun can't be an empty");
    }

    if (substr($noun,0,1) === substr($noun, -1)) {

        return ucfirst($noun . substr($noun, 1));
    }

    return "The " . ucfirst($noun);
}