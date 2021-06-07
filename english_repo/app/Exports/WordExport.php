<?php

namespace App\Exports;

use App\Models\Words;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class WordExport implements FromView
{
    public function view(): View{
      return view('exports.words',[
          'words' => Words::all()->where('user_id',DB::table('sessions')->value('user_id'))
      ]);
  }
}
