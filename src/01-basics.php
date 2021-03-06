<?php
const MIN_YEAR = 1900;

const FIRST_QUARTER = 'first';
const SECOND_QUARTER = 'second';
const THIRD_QUARTER = 'third';
const FOURTH_QUARTER = 'fourth';
const SECONDS_IN_MINUTE = 60;

const VALID_LENGTH = 6;

/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute): string
{
    if ($minute < 0 || $minute >= SECONDS_IN_MINUTE) {
        throw new InvalidArgumentException();
    }

    if ($minute > 0 && $minute <= 15) {
        return FIRST_QUARTER;
    } elseif ($minute > 15 && $minute <= 30) {
        return SECOND_QUARTER;
    } elseif ($minute > 30 && $minute <= 45) {
        return THIRD_QUARTER;
    } elseif ($minute > 45 || $minute === 0) {
        return FOURTH_QUARTER;
    }
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  int  $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year): bool
{
    if ($year < MIN_YEAR) {
        throw new InvalidArgumentException();
    }
    if ($year % 100 === 0 && $year % 400 !== 0) {
        return false;
    }

    return ($year % 4) === 0;
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param  string  $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input): bool
{
    $length = strlen($input);
    if ($length !== VALID_LENGTH || !is_numeric($input)) {
        throw new InvalidArgumentException();
    }
    $halfLength = $length / 2;

    return getSumOfDigits(substr($input, 0, $halfLength)) === getSumOfDigits(substr($input, -$halfLength));
}

function getSumOfDigits(string $input): int
{
    $sum = 0;
    foreach (str_split($input) as $digit) {
        $sum += (int) $digit;
    }

    return $sum;
}
