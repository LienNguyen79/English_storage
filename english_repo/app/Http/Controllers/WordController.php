<?php

namespace App\Http\Controllers;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\Component;
class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getForm()
    {
        //
        return view('word.word_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeWord(Request $request){
        $words = new Words;
        $words->name_word = $request->word;
        $words->type_word = $request->type;
        $words->mean = $request->mean;
        $words->image_path = $request->image;
        $words->sound_path = $request->sound;
        $words->note = $request->note;
        $words->save();
        
    }
}