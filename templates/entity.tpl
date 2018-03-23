<?php

declare(strict_types=1);

namespace App\Entity;

use Wtf\ORM\Entity;

class {{name}} extends Entity
{
    /**
     * {@inheritdoc}
     */
    public function getTable(): string
    {
        return '{{table}}';
    }

    /**
     * {@inheritdoc}
     */
    public function getValidators(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getRelations(): array
    {
        return [];
    }
}
