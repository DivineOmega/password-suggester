<?php

namespace DivineOmega\PasswordSuggester;

use Illuminate\Translation\Translator;
use Illuminate\Validation;
use Illuminate\Translation;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\Factory;
use Illuminate\Validation\Validator;

class ValidatorFactory
{
    private $factory;

    public function __construct()
    {
        $this->factory = new Factory($this->loadTranslator());
    }

    protected function loadTranslator(): Translator
    {
        $filesystem = new Filesystem();
        $loader = new Translation\FileLoader($filesystem, __DIR__.'/../resources/lang');
        $loader->addNamespace('lang',__DIR__.'/../resources/lang');
        $loader->load('en', 'validation', 'lang');
        return new Translator($loader, 'en');
    }

    public function make(array $data, array $rules): Validator
    {
        return $this->factory->make($data, $rules);
    }
}