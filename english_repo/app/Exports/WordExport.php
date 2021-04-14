<?php

namespace App\Exports;

use App\Models\Words;
use Maatwebsite\Excel\Concerns\FromCollection;

class WordExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Words::all();
    }
}
