<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Helper\File;

class CRUD extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:crud')
             ->setDescription('Generate new controller with CRUD actions, entity, migration and route file')
             ->setHelp('This command allows you to generate CRUD controller, entity, migration, route')
             ->addArgument('name', InputArgument::REQUIRED, 'Controller, route, entity name, eg: user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        foreach (['controller', 'entity', 'route', 'migration'] as $element) {
            $item = $this->getApplication()->find('generate:'.$element);
            $arguments = [
                'command' => 'generate:'.$element,
                'name' => ('migration' === $element) ? 'Init'.ucfirst(strtolower($input->getArgument('name'))) : $input->getArgument('name'),
            ];
            $item->run(new ArrayInput($arguments), $output);

            if (in_array($element, ['controller', 'entity'], true)) {
                $test = $this->getApplication()->find('generate:test');
                $arguments = [
                    'command' => 'generate:test',
                    'name' => $input->getArgument('name'),
                    'type' => $element,
                ];
                $test->run(new ArrayInput($arguments), $output);
            }
        }
    }
}
