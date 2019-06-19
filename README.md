# Password Suggester

## Installation

TODO

## Usage

```php
use DivineOmega\PasswordSuggester\PasswordSuggester;
use DivineOmega\PasswordSuggester\SuggestionStrategies\WordsStrategy;

require_once __DIR__.'/../vendor/autoload.php';

echo (new PasswordSuggester())->suggest(new WordsStrategy());
echo PHP_EOL;
```
