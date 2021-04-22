<?php

namespace App\Imports;

use App\Models\Words;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class WordImport implements ToModel,WithHeadingRow
{
    protected $fillable = ['name_word','type_word','mean','image_path','sound_path','note'];
    public function headingRow() : int {
        return 1;
    }
    public function model(array $row)
    {
        $words = new Words;
        $words->name_word = $row['tu'];
        $words->type_word = $row['loai_tu'];
        $words->mean = $row['nghia'];
        $words->image_path = $row['hinh_anh'];
        $words->sound_path = $row['am_thanh'];
        $words->note = $row['ghi_chu'];
        $words->user_id = DB::table('sessions')->value('user_id');
        return $words;
    }
}
