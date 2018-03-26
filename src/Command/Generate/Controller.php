<?php

declare(strict_types=1);

namespace Wtf\Generator\Command\Generate;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Wtf\Generator\Command;
use Wtf\Generator\Helper\Template;

class Controller extends Command
{
    protected function configure(): void
    {
        $this->setName('generate:controller')
             ->setDescription('Generate new controller')
             ->setHelp('This command allows you to generate controller')
             ->addArgument('name', InputArgument::REQUIRED, 'Controller name');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        parent::execute($input, $output);
        $name_lower = strtolower($input->getArgument('name'));
        $name = ucfirst($name_lower);
        $output->writeln('Controller saved to '.Template::renderSave('controller', $name, ['name' => $name, 'name_lower' => $name_lower]));
    }
}
