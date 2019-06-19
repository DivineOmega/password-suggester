<?php

namespace DivineOmega\PasswordSuggester;

use DivineOmega\PasswordSuggester\Interfaces\SuggestionStrategyInterface;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

class PasswordSuggester
{
    public function suggest(SuggestionStrategyInterface $suggestionStrategy)
    {
        app()->bind('config', function() {
            return new FakeClass();
        });

        app()->bind('path.storage', function() {
            return __DIR__.'/../storage';
        });

        app()->bind('translator', function() {
            return new FakeClass();
        });

        $rules = PasswordRules::register(null);
        $validatorFactory = new ValidatorFactory();

        do {
            $password = $suggestionStrategy->suggest();

            $data = [
                'password' => $password,
                'password_confirmation' => $password,
            ];

            $validator = $validatorFactory->make($data, ['password' => $rules]);

        } while ($validator->fails());

        return $password;
    }
}