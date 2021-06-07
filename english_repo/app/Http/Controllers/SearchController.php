<?php

namespace App\Http\Controllers;
use App\Models\Words;
use App\Http\Controllers\Middleware;
use App\Http\Controllers\WordController;
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
        if (isset($_POST['searchButton'])){
            $searchWord = $_POST['searchWord'];       
            if (strlen(trim($searchWord)) > 0) {
                $words = new Words; 
                $words->user_id = DB::table('sessions')->value('user_id');
                $words = DB::table('words')
                ->where('name_word','like',$searchWord.'%')
                ->orWhere('type_word','like',$searchWord)
                ->orWhere('mean','like','%'.$searchWord.'%')
                ->paginate(5);
              
                //dd($words);
                 //die();
                
                return view('word.display_word',compact('words'));
             }
        }
    }

    // public function test(Request $request){
    //     $test = new WordController;
    //     $test->deleteAndUpdate(Request $request);
    //     $test->

    // }


    
}
