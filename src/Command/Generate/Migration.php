<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Command;
use Wtf\Generator\Helper\File;

class Migration extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:migration')
             ->setDescription('Generate new migration')
             ->setHelp('This command allows you to generate migrations')
             ->addArgument('name', InputArgument::REQUIRED, 'Migration name');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        parent::execute($input, $output);
        //You need set this var to "cheat" Symfony Console component and pass all needed params
        $_SERVER['argv'] = [
            'run.php', //Any string, doesn't matter
            'create', //Command to Phinx
            $input->getArgument('name'), //migration name
            '-c', File::getConfigDir().'phinx.php', //Path to your config file
        ];
        $phinx = new \Phinx\Console\PhinxApplication();
        $phinx->run();
    }
}
