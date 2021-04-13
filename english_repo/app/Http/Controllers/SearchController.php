<?php

namespace App\Http\Controllers;
use App\Models\Words;
use App\Http\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// search theo name word, type word, mean
    public function search(Request $request){
        if (isset($_GET['searchButton'])){
            $searchWord = $_GET['searchWord'];       
            if (strlen(trim($searchWord)) > 0) {
                $words = new Words; 
                $words->user_id = DB::table('sessions')->value('user_id');
                $words = DB::table('words')
                ->where('name_word','like',$searchWord.'%')
                ->orWhere('type_word','like',$searchWord)
                ->orWhere('mean','like','%'.$searchWord.'%')
                ->get();
                //var_dump($words);
                //die();
                if(empty($words)){
                    echo 'Khong tim thay tu nay dau hiuhiu';
                }
                else return view('word.display_word',compact('words'));
             }
        }
    }
    
}
