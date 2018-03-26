<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Command;
use Wtf\Generator\Helper\Template;

class Route extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:route')
             ->setDescription('Generate new route')
             ->setHelp('This command allows you to generate routes')
             ->addArgument('name', InputArgument::REQUIRED, 'Route group name');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        parent::execute($input, $output);
        $name = strtolower($input->getArgument('name'));
        $output->writeln('Route saved to '.Template::renderSave('route', $name));
    }
}
