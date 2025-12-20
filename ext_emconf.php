<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Numbered Pagination',
    'description' => 'Improved pagination for TYPO3 10+',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '2.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-14.3.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'classmap' => ['Classes'],
    ],
];
