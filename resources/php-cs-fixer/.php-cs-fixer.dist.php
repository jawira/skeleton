<?php declare(strict_types=1);

$rules = [
  '@PSR12' => true,
  '@PHP8x5Migration' => true, // Update this according to your PHP version
  '@PhpCsFixer' => true,
  'return_assignment' => false,
  'declare_strict_types' => true,
  'linebreak_after_opening_tag' => false,
  'blank_line_after_opening_tag' => false,
  'global_namespace_import' => ['import_classes' => true, 'import_constants' => true, 'import_functions' => true],
];

$headerRules = [
  'KonradMichalik/docblock_header_comment' => [
    'annotations' => [
      'author' => 'Jawira Portugal <dev@tugal.be>',
      'copyright' => "2026 Jawira Portugal",
      'license' => 'MIT',
    ],
    'preserve_existing' => false,
    'separate' => 'none',
    'add_structure_name' => true,
  ],
];

return (new \PhpCsFixer\Config())
  ->setRules($rules)
  ->setHideProgress(true)
  ->setIndent('  ')
  ->registerCustomFixers([
    new \KonradMichalik\PhpDocBlockHeaderFixer\Rules\DocBlockHeaderFixer(),
  ])
  ->setRules($rules + $headerRules);
