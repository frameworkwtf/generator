<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Helper\File;
use Wtf\Generator\Helper\Template;

class Test extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:test')
             ->setDescription('Generate new unit test')
             ->setHelp('This command allows you to generate unit tests')
             ->addArgument('name', InputArgument::REQUIRED, 'Test name')
             ->addArgument('type', InputArgument::OPTIONAL, 'Test type (subdir)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $name = ucfirst(strtolower($input->getArgument('name')));
        $type = '';
        $namespace = '';
        $subdir = '';
        if ($input->getArgument('type')) {
            $type = ucfirst(strtolower($input->getArgument('type')));
            $namespace = '\\'.$type;
            $subdir = '/..';
        }
        $path = File::getAppDir().'tests/'.$type.'/'.$name.'Test.php';
        File::save($path, Template::render('test', ['name' => $name, 'type' => $type, 'namespace' => $namespace, 'subdir' => $subdir]));
        $output->writeln('Test saved to '.File::realpath($path));
    }
}
