<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Words extends Model
{
    use HasFactory;
    protected $table = 'words';
    protected $fillable = ['name_word','type_word','mean','image_path','sound_path','note'];
    public function user(){
        return $this->belongsto('App\User');
    }
}
