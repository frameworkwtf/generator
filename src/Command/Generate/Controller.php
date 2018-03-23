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
        $name = ucfirst(strtolower($input->getArgument('name')));
        $path = File::getGeneratorDir().'../../../src/Controller/'.$name.'.php';
        File::save($path, Template::render('controller', ['name' => $name]));
        $output->writeln('Controller saved to '.$path);
    }
}
