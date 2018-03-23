<?php
namespace Wtf\Generator\Command\Generate;
use Wtf\Generator\Helper\File;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Migration extends Command
{
    protected function configure()
    {
        $this->setName('generate:migration')
             ->setDescription('Generate new migration')
             ->setHelp('This command allows you to generate migrations')
             ->addArgument('name', InputArgument::REQUIRED, 'Migration name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //You need set this var to "cheat" Symfony Console component and pass all needed params
        $_SERVER['argv'] = [
            'run.php', //Any string, doesn't matter
            'create', //Command to Phinx
            $input->getArgument('name'), //migration name
            '-c', File::getConfigDir() . 'phinx.php', //Path to your config file
        ];
        $phinx = new \Phinx\Console\PhinxApplication();
        $phinx->run();
    }
}
