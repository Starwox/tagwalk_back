<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Services\CsvReader;
use Doctrine\ORM\EntityManagerInterface;

#[AsCommand(
    name: 'app:import-csv',
    description: 'Import data from a CSV file.',
)]
class AppImportCsvCommand extends Command
{
    private $csvReader;

    public function __construct(EntityManagerInterface $entityManager, string $projectDir)
    {
        parent::__construct();
        $this->csvReader = new CsvReader($entityManager, $projectDir);
    }

    protected function configure(): void
    {
        $this
            ->addArgument('filename', InputArgument::OPTIONAL, 'The path to the CSV file.')
            ->setHelp('This command can import data from a CSV file.');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        //$reader = new CsvReader(getcwd());
        $records = $this->csvReader->importCsvData();


        $output->writeln('Les looks ont été importés avec succès.');

        return Command::SUCCESS;
    }
}
