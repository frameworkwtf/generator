<?php

declare(strict_types=1);

return [
    '' => [
        'action' => 'index',
        'methods' => ['GET'],
    ],
    '/{id}/view' => [
        'action' => 'view',
        'methods' => ['GET'],
    ],
    '/{id}/edit' => [
        'action' => 'edit',
        'methods' => ['PUT'],
    ],
    '/{id}/create' => [
        'action' => 'create',
        'methods' => ['POST'],
    ],
    '/{id}/delete' => [
        'action' => 'delete',
        'methods' => ['DELETE'],
    ],
];
