<?php

namespace App\Commands;

use App\Services\DingService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


// the name of the command is what users type after "php bin/console"
#[AsCommand(name: 'app:hello')]
class HelloCommand extends Command
{
    private $dingService;

    public function __construct(DingService $dingService)
    {
        parent::__construct();
        $this->dingService = $dingService;
    }

    protected function execute(InputInterface $input, OutputInterface $output):int
    {

        $array = array(2,5,7,35,70);
        $ding = $this->dingService->ding($array);

        $output->writeln($ding);
        return Command::SUCCESS;

    }
}