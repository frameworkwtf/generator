<?php

declare(strict_types=1);

return [
    'index' => [],
    'view' => ['pattern' => '/{id}'],
    'create' => ['methods' => ['POST']],
    'edit' => [
        'pattern' => '/{id}',
        'methods' => ['PUT'],
    ],
    'delete' => [
        'pattern' => '/{id}',
        'methods' => ['DELETE'],
    ],
];
