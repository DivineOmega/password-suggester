<?php

namespace DivineOmega\PasswordSuggester;

use DivineOmega\PasswordSuggester\Exceptions\MaxAttemptsExceededException;
use DivineOmega\PasswordSuggester\Interfaces\SuggestionStrategyInterface;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

class PasswordSuggester
{
    private $maxAttempts = 100;

    /**
     * Suggest a NIST rules compliant password based on the given password suggestion strategy.
     *
     * @param SuggestionStrategyInterface $suggestionStrategy
     * @return string
     * @throws MaxAttemptsExceededException
     */
    public function suggest(SuggestionStrategyInterface $suggestionStrategy)
    {
        $this->performBinds();

        $rules = PasswordRules::register(null);
        $validatorFactory = new ValidatorFactory();

        $attempts = 0;

        do {
            $attempts++;

            if ($attempts > $this->maxAttempts) {
                throw new MaxAttemptsExceededException();
            }

            $password = $suggestionStrategy->suggest();

            $data = [
                'password' => $password,
                'password_confirmation' => $password,
            ];

            $validator = $validatorFactory->make($data, ['password' => $rules]);

        } while ($validator->fails());

        return $password;
    }

    /**
     * Perform app bindings required for Illuminate Validator instantiation.
     */
    private function performBinds()
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
    }
}