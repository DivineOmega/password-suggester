# Password Suggester

## Installation

To install Password Suggester, run the following Composer command from the
root of your project.

```bash
composer require divineomega/password-suggester
``` 

## Usage

See the following basic usage example.

```php
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
```
