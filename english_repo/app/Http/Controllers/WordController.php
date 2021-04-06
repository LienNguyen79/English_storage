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
        if($request->image->isValid()){ 
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $file_mime = $file->getMimeType();        
            //if (!in_array($file_ex, array('jpg', 'gif', 'png'))) return Redirect::to('/')->withErrors('Invalid image extension we just allow JPG, GIF, PNG');            
            $newname = base_path().'/public/image/'.$file_name;
            $file->move(base_path().'/public/image/', $newname);
            $words->image_path = $newname;
            }
            if($request->sound->isValid()){ 
                $file = $request->file('sound');
                $file_name = $file->getClientOriginalName();
                $file_size = round($file->getSize() / 1024);
                $file_ex = $file->getClientOriginalExtension();
                $file_mime = $file->getMimeType();                 
                $newname = base_path().'/public/sound/'.$file_name;
                $file->move(base_path().'/public/sound/', $newname);
                $words->sound_path = $newname;
                }
        $words->note = $request->note;
        $words->save();
        echo '<dialog open style="color: green; text-align: center; display: middle">
                        <p>Thêm từ thành công</p>
                        <p> Hãy xem trong: Kho từ của bạn </p>
                        <a href="/display_word" class = "underline text-blue-500"><button>OK</button></a>
                      </dialog>';
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
        if(isset($_POST['delete'])){
            $deleWord = new Words;
            $id = $_POST['id'];
            //$id = DB::table('words')->
            $deleWord = DB::table('words')->where('id',$id)->delete();
            echo '<dialog open style="color: green; text-align: center; display: middle">
            <p>Xóa từ thành công</p>
            <p> Hãy xem trong: Kho từ của bạn </p>
            <a href="/display_word" class = "underline text-blue-500"><button>OK</button></a>
            </dialog>';
        }
    }

    
}