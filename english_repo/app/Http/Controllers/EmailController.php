<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Middleware;
use App\Models\Emails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class EmailController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function postEmail(Request $request){
            $email = new Emails;
            $email->email = $request->Email;
            $email->save();
            return view('dashboard');
        
    }
}
