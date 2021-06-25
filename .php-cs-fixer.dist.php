<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/public');

$config = new PhpCsFixer\config();
return $config->setRules([
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
])
    ->setFinder($finder);
