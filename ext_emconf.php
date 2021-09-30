<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Numbered Pagination',
    'description' => 'Improved pagination for TYPO3 10+',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'beta',
    'clearCacheOnLoad' => true,
    'version' => '1.0.2',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.12-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'classmap' => ['Classes'],
    ],
];
