<?php
namespace Wtf\Generator\Command\Generate;
use Wtf\Generator\Helper\File;
use Wtf\Generator\Helper\Template;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CRUD extends Command
{
    protected function configure()
    {
        $this->setName('generate:crud')
             ->setDescription('Generate new controller with CRUD actions, entity, migration and route file')
             ->setHelp('This command allows you to generate CRUD controller, entity, migration, route')
             ->addArgument('name', InputArgument::REQUIRED, 'Controller, route, entity name, eg: user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        foreach(['controller', 'entity', 'route', 'migration'] as $element) {
            $item = $this->getApplication()->find('generate:'.$element);
            $arguments = [
                'command' => 'generate:'.$element,
                'name' => ($element === 'migration') ? 'Init'.ucfirst(strtolower($input->getArgument('name'))) : $input->getArgument('name'),
            ];
            $item->run(new ArrayInput($arguments), $output);
        }
    }
}
