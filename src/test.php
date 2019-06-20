<?php

use DivineOmega\PasswordSuggester\PasswordSuggester;
use DivineOmega\PasswordSuggester\SuggestionStrategies\AlphanumericStrategy;
use DivineOmega\PasswordSuggester\SuggestionStrategies\NumbersStrategy;
use DivineOmega\PasswordSuggester\SuggestionStrategies\WordsStrategy;

require_once __DIR__.'/../vendor/autoload.php';

$passwordSuggester = new PasswordSuggester();

$strategy = new AlphanumericStrategy();
//$strategy = new WordsStrategy();
//$strategy = new NumbersStrategy();

echo $passwordSuggester->suggest($strategy);
echo PHP_EOL;

