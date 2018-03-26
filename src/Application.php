<?php
namespace Wtf\Generator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class Application extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        parent::__construct('WTF framework generator');

        $this->addCommands([
            new Command\Generate\CRUD,
            new Command\Generate\Entity,
            new Command\Generate\Migration,
            new Command\Generate\Seed,
            new Command\Generate\Controller,
            new Command\Generate\Route,
        ]);
    }
}
