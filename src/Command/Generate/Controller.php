<?php
namespace Wtf\Generator\Command\Generate;
use Wtf\Generator\Helper\File;
use Wtf\Generator\Helper\Template;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Controller extends Command
{
    protected function configure()
    {
        $this->setName('generate:controller')
             ->setDescription('Generate new controller')
             ->setHelp('This command allows you to generate controller')
             ->addArgument('name', InputArgument::REQUIRED, 'Controller name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name_lower = strtolower($input->getArgument('name'));
        $name = ucfirst($name_lower);
        $path = File::getGeneratorDir().'../../../src/Controller/'.$name.'.php';
        File::save($path, Template::render('controller', ['name' => $name, 'name_lower' => $name_lower]));
        $output->writeln('Controller saved to '.File::realpath($path));
    }
}
