<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@Symfony' => true,
        '@PSR12' => true,
        'yoda_style' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
;