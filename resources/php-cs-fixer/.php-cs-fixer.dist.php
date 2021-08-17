<?php declare(strict_types=1);
$finder = PhpCsFixer\Finder::create()->in(__DIR__ . DIRECTORY_SEPARATOR . 'src');
$config = new PhpCsFixer\Config();

return $config->setRules(['no_unused_imports'                 => true,
                          'single_blank_line_at_eof'          => true,
                          'no_trailing_whitespace'            => true,
                          'explicit_string_variable'          => true,
                          'heredoc_to_nowdoc'                 => true,
                          'no_binary_string'                  => true,
                          'single_quote'                      => true,
                          'simple_to_complex_string_variable' => true,
                          'braces'                            => true,

                          'phpdoc_order_by_value' => ['annotations' => ['author',
                                                                        'covers',
                                                                        'coversNothing',
                                                                        'dataProvider',
                                                                        'depends',
                                                                        'group',
                                                                        'internal',
                                                                        'method',
                                                                        'property',
                                                                        'property-read',
                                                                        'property-write',
                                                                        'requires',
                                                                        'throws',
                                                                        'uses',],],

                          'phpdoc_scalar'        => ['types' => ['boolean',
                                                                 'callback',
                                                                 'double',
                                                                 'integer',
                                                                 'real',
                                                                 'str',],],
                          'switch_case_space'    => true,
                          'simplified_if_return' => true])->setFinder($finder)->setHideProgress(true)->setIndent('  ');
