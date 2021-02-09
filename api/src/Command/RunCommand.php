<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RunCommand extends Command
{
    protected static $defaultName = 'app:run';

    protected function configure()
    {
        $this
            ->setDescription('Start build and runnig apllication in dev')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {        
        $output->writeln('Criando banco de dados');
        
        $command = $this->getApplication()->find('doctrine:database:create');
        $arguments = [];
        $commandInput = new ArrayInput($arguments);

        $return = $command->run($commandInput,$output);

        $output->writeln('Executando migrations');
        $command = $this->getApplication()->find('doctrine:migrations:migrate');
        $return = $command->run($commandInput,$output);

        $output->writeln('Populando banco de dados');
        $command = $this->getApplication()->find('doctrine:fixtures:load');
        $return = $command->run($commandInput,$output);

        return Command::SUCCESS;
    }
}
