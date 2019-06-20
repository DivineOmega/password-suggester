<?php

namespace DivineOmega\PasswordSuggester\SuggestionStrategies;

use DivineOmega\PasswordSuggester\Interfaces\SuggestionStrategyInterface;
use InvalidArgumentException;

class NumbersStrategy implements SuggestionStrategyInterface
{
    private $numDigits;

    public function __construct(int $numDigits = 8)
    {
        if ($numDigits < 1) {
            throw new InvalidArgumentException('Number of digits must be at least 1.');
        }

        $this->numDigits = $numDigits;
    }

    public function suggest(): string
    {
        $password = '';

        for ($i = 0; $i < $this->numDigits; $i++) {
            $password .= rand(0,9);
        }

        $password = trim($password);

        return $password;
    }
}