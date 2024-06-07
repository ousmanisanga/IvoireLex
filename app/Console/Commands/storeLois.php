<?php

namespace App\Console\Commands;

use App\Models\Loi;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class storeLois extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:lois';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'enregistre les lois';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $worksheet =  $this->getActiveSheet(storage_path('data/lois.xlsx'));
        $counter = 0;
        foreach($worksheet->getRowIterator() as $row) {

            if ($counter++ == 0) continue;


            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);

            $cells = [];

            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }



            Loi::create([
                'statut' => $cells[0],
                'typeLoi' => $cells[1],
                'titre' => $cells[2],
                'datePublication' => $cells[3],
                'numeroLoi' => $cells[4],
                'annexe' => $cells[5],
                'contenu' => $cells[6]

            ]);

        }
       $this->comment('loi enregistrées avec succes ');
    }


    private function getActiveSheet(string $path): Worksheet
    {
        return (new Xlsx)
            ->load($path)
            ->getActiveSheet();
    }


}
