<?php

namespace DivineOmega\PasswordSuggester\SuggestionStrategies;

use DivineOmega\PasswordSuggester\Interfaces\SuggestionStrategyInterface;
use InvalidArgumentException;

class AlphanumericStrategy implements SuggestionStrategyInterface
{
    private $numWords;
    private $numCharacters = [];

    public function __construct(int $numCharacters = 8)
    {
        if ($numCharacters < 8) {
            throw new InvalidArgumentException('Number of characters must be at least 8.');
        }

        $this->numCharacters = $numCharacters;
    }

    public function suggest(): string
    {
        return $this->randomString($this->numCharacters);
    }

    private function randomString($length)
    {
        $string = '';
        while (($len = strlen($string)) < $length) {
            $size = $length - $len;
            $bytes = random_bytes($size);
            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }
        return $string;
    }
}