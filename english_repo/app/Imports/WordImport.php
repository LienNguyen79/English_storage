<?php

namespace App\Imports;

use App\Models\Words;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class WordImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Words([
            'name_word' => $row[1],
            'type_word' => $row[2],
            'mean' => $row[3],
            'image_path' =>$row[4],
            'sound_path' => $row[5],
            'note' => $row[6],
            'user_id' => $row[7]
        ]);
    }
}
