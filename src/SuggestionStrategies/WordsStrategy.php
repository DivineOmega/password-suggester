<?php

namespace DivineOmega\PasswordSuggester\SuggestionStrategies;

use DivineOmega\PasswordSuggester\Interfaces\SuggestionStrategyInterface;
use InvalidArgumentException;

class WordsStrategy implements SuggestionStrategyInterface
{
    private $numWords;
    private $words = [];

    public function __construct(int $numWords = 3)
    {
        if ($numWords < 1) {
            throw new InvalidArgumentException('Number of words must be at least 1.');
        }

        $this->numWords = $numWords;
        $this->words = file(__DIR__.'/../../resources/words.txt');
    }

    public function suggest(): string
    {
        $password = '';

        for ($i = 0; $i < $this->numWords; $i++) {
            $index = array_rand($this->words);
            $password .= trim($this->words[$index]).' ';
        }

        $password = trim($password);

        return $password;
    }
}