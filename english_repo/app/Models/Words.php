<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    use HasFactory;
    protected $table = 'words';
    public function user(){
        return $this->belongsto('App\User');
    }
}
