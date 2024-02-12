<?php

namespace App\Services;

use League\Csv\Reader;
use App\Entity\Looks;
use Doctrine\ORM\EntityManagerInterface;

class CsvReader
{
    private $entityManager;
    private $projectDir;

    public function __construct(EntityManagerInterface $entityManager,string $projectDir)
    {
        $this->entityManager = $entityManager;
        $this->projectDir = $projectDir;
    }

    public function importCsvData(): void
    {
        $csvPath = $this->projectDir . '/public/looks.csv';
        $csv = Reader::createFromPath($csvPath, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $looks = new Looks();
            $looks->setFileUrl($record['file_url']);
            $looks->setSeason($record['season']);
            $looks->setBrand($record['brand']);
            $looks->setTags(explode(";", $record['tags']));
            $this->entityManager->persist($looks);
        }

        $this->entityManager->flush();
    }
}
