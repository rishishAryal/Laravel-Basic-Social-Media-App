<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function index(){
        $posts= Post::get();
        $users=User::get();

        $postsWithUsers = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->get();


        return view('index.index',
        ['postsWithUsers'=>$postsWithUsers]);


    }
    public function create(){

        return view('posts.create');
    }
    public function store(){

       $attributes =  request()->validate([
           'post_caption'=>'',
           'post_image'=>'mimes:jpg,png,jpeg|max:50480|unique:posts,post_image'

       ]);
        $newImageName =null;
if (\request()->post_image){
    $newImageName =time().'-'.auth()->user()->name.'-Userid-'.Auth::user()->id.'-Post'.'.'.request()->post_image->extension();
    request()->post_image->move(public_path('post_image'),$newImageName);
}


$attributes['post_image']=$newImageName;
$attributes['user_id']=Auth::user()->id;


       Post::create($attributes);

        return redirect('/');

    }
    public function destroy($post_id){
Post::where('post_id',$post_id)->delete();

        return redirect('/');
    }
}
