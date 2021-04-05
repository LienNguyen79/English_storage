<?php

namespace App\Http\Controllers;
use App\Models\Words;
use App\Http\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //hiển thị form thêm từ 
    public function getForm(Request $request)
    {
        //
        return view('word.word_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //xử lý thêm từ vào DB
    public function storeWord(Request $request){
        //echo $request;      
        $words = new Words;
        $words->user_id = DB::table('sessions')->value('user_id');
        $words->name_word = $request->word;
        $words->type_word = $request->type;
        $words->mean = $request->mean;
        $words->image_path = $request->image;
        $words->sound_path = $request->sound;
        $words->note = $request->note;
        $words->save();
        echo "them tu thanh cong. hay xem trong";
        echo "<a href='/display_word' class = 'underline text-blue-500'>Kho tu cua ban</a>";
    }

    //hiển thị danh sách từ của user
    public function getWord(){
        $session_id = DB::table('sessions')->value('user_id');
        $words = DB::table('words')->select('*')->where('user_id',$session_id)->get();
        return view('word.display_word',compact('words'));
    }

    public function update(Request $request){
        return view('word.update');
    }

    public function delete(Request $request){
        if(isset($_GET['delete'])){
            $deleWord = new Word;
            $id = $_GET('id');
            $deleWord = DB::table('words')->where('id',$id)->delete();
            echo "Xoa tu thanh cong. hay xem trong";
            echo "<a href='/display_word' class = 'underline text-blue-500'>Kho tu cua ban</a>";
        }
    }

    
}