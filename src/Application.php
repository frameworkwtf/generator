<?php

declare(strict_types=1);

namespace Wtf\Generator;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        parent::__construct('WTF framework generator');

        $this->addCommands([
            new Command\Generate\CRUD(),
            new Command\Generate\Entity(),
            new Command\Generate\Migration(),
            new Command\Generate\Seed(),
            new Command\Generate\Controller(),
            new Command\Generate\Route(),
            new Command\Generate\Test(),
        ]);

        $this->getDefinition()->addOptions([
            new InputOption('--configuration', '-c', InputOption::VALUE_REQUIRED, 'Configuration file to load'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function doRun(InputInterface $input, OutputInterface $output)
    {
        // always show the version information except when the user invokes the help
        // command as that already does it
        if (false === $input->hasParameterOption(['--help', '-h']) && null !== $input->getFirstArgument() && 'list' !== $input->getFirstArgument()) {
            $output->writeln($this->getLongVersion());
            $output->writeln('');
        }

        return parent::doRun($input, $output);
    }
}
