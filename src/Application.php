<?php

declare(strict_types=1);

namespace Wtf\Generator;

class Application extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        parent::__construct('WTF framework generator');

        $this->addCommands([
            new Command\Generate\CRUD(),
            new Command\Generate\Entity(),
            new Command\Generate\Migration(),
            new Command\Generate\Seed(),
            new Command\Generate\Controller(),
            new Command\Generate\Route(),
        ]);
    }
}
