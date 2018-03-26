<?php

declare(strict_types=1);

namespace Wtf\Generator;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Helper\Config;

class Command extends \Symfony\Component\Console\Command\Command
{
    protected function configure(): void
    {
        $this->addOption('--configuration', '-c', InputOption::VALUE_REQUIRED, 'The configuration file to load');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        Config::setFile($input->getOption('configuration'));
    }
}
