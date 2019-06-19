<?php

use DivineOmega\PasswordSuggester\PasswordSuggester;
use DivineOmega\PasswordSuggester\SuggestionStrategies\WordsStrategy;

require_once __DIR__.'/../vendor/autoload.php';

$passwordSuggester = new PasswordSuggester();

echo $passwordSuggester->suggest(new WordsStrategy());
echo PHP_EOL;

