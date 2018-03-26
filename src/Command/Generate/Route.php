<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Helper\File;
use Wtf\Generator\Helper\Template;

class Route extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:route')
             ->setDescription('Generate new route')
             ->setHelp('This command allows you to generate routes')
             ->addArgument('name', InputArgument::REQUIRED, 'Route group name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $name = strtolower($input->getArgument('name'));
        $path = File::getGeneratorDir().'../../../config/routes/'.$name.'.php';
        File::save($path, Template::render('route'));
        $output->writeln('Route saved to '.File::realpath($path));
    }
}
