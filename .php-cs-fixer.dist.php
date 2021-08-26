<?php

$rules = [
    '@Symfony' => true,
    'no_mixed_echo_print' => true,
    'phpdoc_no_empty_return' => false,
    'array_syntax' => ['syntax' => 'short'],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_trailing_comma_in_singleline_array' => true,
    'trim_array_spaces' => true,
    'normalize_index_brace' => true,
    'yoda_style' => false,
    'concat_space' => ['spacing' => 'one'],
    'not_operator_with_space' => false,
    'increment_style' => ['style' => 'post'],
    'php_unit_method_casing' => ['case' => 'snake_case'],
    'global_namespace_import' => ['import_classes' => true, 'import_constants' => true],
];

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__ . DIRECTORY_SEPARATOR . 'src')
    ->in(__DIR__ . DIRECTORY_SEPARATOR . 'tests')
    ->append(['.php-cs-fixer.dist.php']);

return (new PhpCsFixer\Config())
    ->setUsingCache(true)
    ->setRules($rules)
    ->setFinder($finder);
