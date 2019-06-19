<?php

namespace DivineOmega\PasswordSuggester\Interfaces;

interface SuggestionStrategyInterface
{
    public function suggest() :string;
}