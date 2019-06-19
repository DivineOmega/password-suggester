<?php

namespace DivineOmega\PasswordSuggester\SuggestionStrategies;

use DivineOmega\PasswordSuggester\Interfaces\SuggestionStrategyInterface;

class WordsStrategy implements SuggestionStrategyInterface
{
    private $words = [];

    public function __construct()
    {
        $this->words = file(__DIR__.'/../../resources/words.txt');
    }

    public function suggest(): string
    {
        $password = '';

        for ($i = 0; $i < 4; $i++) {
            $index = array_rand($this->words);
            $password .= trim($this->words[$index]).' ';
        }

        $password = trim($password);

        return $password;
    }
}