<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Words;
use App\Http\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
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
        $pathImage= 'image/';
        $pathSound = 'sound/';
        $words = new Words;
        $words->user_id = DB::table('sessions')->value('user_id');
        $words->name_word = $request->word;
        $words->type_word = $request->type;
        $words->mean = $request->mean;
        if($request->image != null && $request->hasFile('image')){ 
            $file_image = $request->file('image');
            $file_image_name = $file_image->getClientOriginalName();
            $file_image_size = round($file_image->getSize() / 1024);
            $file_image_ex = $file_image->getClientOriginalExtension();
            $file_image_mime = $file_image->getMimeType();        
            //if (!in_array($file_ex, array('jpg', 'gif', 'png'))) return Redirect::to('/')->withErrors('Invalid image extension we just allow JPG, GIF, PNG');            
            //$newname = base_path().'/public/image/'.$file_name;
            $file_image->move(base_path().'/public/image/', $file_image_name);
            $words->image_path = $pathImage.$file_image_name;
            }
        else $words->image_path = NULL;
        if($request->hasFile('sound')){ 
            $file_sound = $request->file('sound');
            $file_sound_name = $file_sound->getClientOriginalName();
            $file_sound_size = round($file_sound->getSize() / 1024);
            $file_sound_ex = $file_sound->getClientOriginalExtension();
            $file_sound_mime = $file_sound->getMimeType();                 
            //$newname = base_path().'/public/sound/'.$file_name;
            $file_sound->move(base_path().'/public/sound/', $file_sound_name);
            $words->sound_path = $pathSound.$file_sound_name;
            }
        else $words->sound_path = NULL;
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
        //$words = DB::table('words')->select('*')->where('user_id',$session_id)->get()->paginate(5);
        $words = DB::table('words')->where('user_id',$session_id)->paginate(5);
        //$words = DB::table('words')->paginate(2);
        //dd($words);
        return view('word.display_word',compact('words'));
    }
// xu ly button update and delete in display_view
    public function deleteAndUpdate(Request $request){
        if(isset($_POST['update'])){
            $updateWord = new Words;
            $id = $_POST['id'];
            $updateWord = DB::table('words')->select('*')->where('id',$id)->get();
            //echo $updateWord;
            return view('word.update',compact('updateWord'));
        }
        if(isset($_POST['delete'])){
            $deleWord = new Words;
            $id = $_POST['id'];
            $deleWord = DB::table('words')->where('id',$id)->delete();
            echo '<dialog open style="color: green; text-align: center; display: middle">
            <p>Xóa từ thành công</p>
            <p> Hãy xem trong: Kho từ của bạn </p>
            <a href="/display_word" class = "underline text-blue-500"><button>OK</button></a>
            </dialog>';
        }
    }
// update word 
    public function update(Request $request){
        $updateWord = new Words; 
        $pathImage= 'image/';
        $pathSound = 'sound/';  
        if($request->image != NULL && $request->hasFile('image')){ 
            $file_image = $request->file('image');
            $file_image_name = $file_image->getClientOriginalName();
            $file_image_size = round($file_image->getSize() / 1024);
            $file_image_ex = $file_image->getClientOriginalExtension();
            $file_image_mime = $file_image->getMimeType();        
            $file_image->move(base_path().'/public/image/', $file_image_name);        
            }
        if($request->sound != NULL && $request->hasFile('sound')){ 
            $file_sound = $request->file('sound');
            $file_sound_name = $file_sound->getClientOriginalName();
            $file_sound_size = round($file_sound->getSize() / 1024);
            $file_sound_ex = $file_sound->getClientOriginalExtension();
            $file_sound_mime = $file_sound->getMimeType();                 
            //$newname = base_path().'/public/sound/'.$file_name;
            $file_sound->move(base_path().'/public/sound/', $file_sound_name);
            
            }
        if ($request->image != NULL){
            if ($request->sound != NULL){
                $updateWord = DB::table('words')->where('id',$request->id)->update(['name_word'=>($request->word),'type_word'=>($request->type),'image_path'=>($pathImage.$file_image_name),'sound_path'=>($pathSound.$file_sound_name) ,'mean'=>($request->mean), 'note'=>($request->note)]);
            }
            else {
                $updateWord = DB::table('words')->where('id',$request->id)->update(['name_word'=>($request->word),'type_word'=>($request->type),'image_path'=>($pathImage.$file_image_name),'mean'=>($request->mean), 'note'=>($request->note)]);
            }
        }
        else {
            if ($request->sound != NULL){
                $updateWord = DB::table('words')->where('id',$request->id)->update(['name_word'=>($request->word),'type_word'=>($request->type),'sound_path'=>($pathSound.$file_sound_name) ,'mean'=>($request->mean), 'note'=>($request->note)]);
            }
            else {
                $updateWord = DB::table('words')->where('id',$request->id)->update(['name_word'=>($request->word),'type_word'=>($request->type),'mean'=>($request->mean), 'note'=>($request->note)]);
            }
        }
        echo '<dialog open style=" background: #01DFD7; color: green; text-align: center; display: middle">
                        <p>Sửa từ thành công</p>
                        <p> Hãy xem trong: Kho từ của bạn </p>
                        <a href="/display_word" class = "underline text-blue-500"><button>OK</button></a>
                      </dialog>';
    }   
        

    
}