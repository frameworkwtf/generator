<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Helper\File;

class Seed extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:seed')
             ->setDescription('Generate new seed')
             ->setHelp('This command allows you to generate seed')
             ->addArgument('name', InputArgument::REQUIRED, 'Seed name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        //You need set this var to "cheat" Symfony Console component and pass all needed params
        $_SERVER['argv'] = [
            'run.php', //Any string, doesn't matter
            'seed:create', //Command to Phinx
            $input->getArgument('name'), //seed name
            '-c', File::getConfigDir().'phinx.php', //Path to your config file
        ];
        $phinx = new \Phinx\Console\PhinxApplication();
        $phinx->run();
    }
}
