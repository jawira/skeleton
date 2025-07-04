<?php declare(strict_types=1);

$rules = [
  '@PSR12' => true,
  '@PHP83Migration' => true,
  '@PhpCsFixer' => true,
  'return_assignment' => false,
  'declare_strict_types' => true,
  'linebreak_after_opening_tag' => false,
  'blank_line_after_opening_tag' => false,
  'global_namespace_import' => ['import_classes' => true, 'import_constants' => true, 'import_functions' => true],
];

return (new \PhpCsFixer\Config())->setRules($rules)->setHideProgress(true)->setIndent('  ');
