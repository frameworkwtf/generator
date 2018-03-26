<?php
namespace Wtf\Generator\Command\Generate;
use Wtf\Generator\Helper\File;
use Wtf\Generator\Helper\Template;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Entity extends Command
{
    protected function configure()
    {
        $this->setName('generate:entity')
             ->setDescription('Generate new entity')
             ->setHelp('This command allows you to generate entities')
             ->addArgument('name', InputArgument::REQUIRED, 'Entity name')
             ->addArgument('table', InputArgument::OPTIONAL, 'Database table name. Default is <name>s');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = ucfirst(strtolower($input->getArgument('name')));
        $table = strtolower($input->getArgument('table') ?? $name.'s');
        $path = File::getGeneratorDir().'../../../src/Entity/'.$name.'.php';
        File::save($path, Template::render('entity', ['name' => $name, 'table' => $table]));
        $output->writeln('Entity saved to '.$path);
    }
}