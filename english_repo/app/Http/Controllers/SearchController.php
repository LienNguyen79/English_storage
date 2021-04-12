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

    public function search(Request $request){
        if (isset($_GET['searchButton'])){
            $searchWord = $_GET['searchWord'];       
            if (strlen(trim($searchWord)) > 1) {
                $words = new Words; 
                $words->user_id = DB::table('sessions')->value('user_id');
                $words = DB::table('words')->where('name_word','like',$searchWord)->get();
                return view('word.display_word',compact('words'));
             }
        }
    }
    
}
