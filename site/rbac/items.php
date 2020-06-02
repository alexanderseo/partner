<?php
return [
    'registrationReport' => [
        'type' => 2,
    ],
    'purchaseReport' => [
        'type' => 2,
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
    ],
    'partner' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'purchaseReport',
        ],
    ],
];
