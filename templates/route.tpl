<?php

declare(strict_types=1);

return [
    'index' => [
        'rbac' => [
            'anonymous' => ['GET'],
        ],
    ],
    'view' => [
        'pattern' => '/{id}',
        'rbac' => [
            'anonymous' => ['GET'],
        ],
    ],
    'create' => [
        'methods' => ['POST'],
        'rbac' => [
            'anonymous' => ['POST'],
        ],
    ],
    'edit' => [
        'pattern' => '/{id}',
        'methods' => ['PUT'],
        'rbac' => [
            'anonymous' => ['PUT'],
        ],
    ],
    'delete' => [
        'pattern' => '/{id}',
        'methods' => ['DELETE'],
        'rbac' => [
            'anonymous' => ['DELETE'],
        ],
    ],
];
