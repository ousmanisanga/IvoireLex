<?php

namespace App\Console\Commands;

use App\Models\Reference;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class storeReference extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:reference';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reference modifier';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $worksheet =  $this->getActiveSheet(storage_path('data/reference.xlsx'));
        $counter = 0;
        foreach($worksheet->getRowIterator() as $row) {

            if ($counter++ == 0) continue;


            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(true);

            $cells = [];

            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }



            Reference::create([
                'lois_id' => $cells[0],
                'code' => $cells[1]


            ]);

        }
       $this->comment('reference enregistrées avec succes ');
    }


    private function getActiveSheet(string $path): Worksheet
    {
        return (new Xlsx)
            ->load($path)
            ->getActiveSheet();
    }
}
