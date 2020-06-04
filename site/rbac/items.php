<?php
return [
    'registrationReport' => [
        'type' => 2,
        'ruleName' => 'registrationReport',
    ],
    'purchaseReport' => [
        'type' => 2,
        'ruleName' => 'purchaseReport',
    ],
    'changeUTM' => [
        'type' => 2,
        'ruleName' => 'changeUTM',
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'registrationReport',
            'purchaseReport',
        ],
    ],
    'partner' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'registrationReport',
            'purchaseReport',
            'changeUTM',
        ],
    ],
];
