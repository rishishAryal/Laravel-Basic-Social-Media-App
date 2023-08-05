<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function show($id){
//        dd($id);
        $user=User::findOrFail($id);
        $count = Post::where('user_id', $id)->count();
        $posts=Post::where('user_id', $id)->get();


        return view('profile.profile',[
            'user'=>$user,
            'count'=>$count,
            'posts'=>$posts
        ]);
    }
    public function destroy($post_id){
        Post::where('post_id',$post_id)->delete();

        return redirect()->back();
    }
    public function edit($id){
        $user=User::find($id);

        return view('profile.edit',[
            'user'=>$user
        ]);
    }
    public function put($id){


        $attributes =  request()->validate([
            'bio'=>'',
            'name'=>'',
            'profile_pic'=>'mimes:jpg,png,jpeg|max:50480|unique:posts,post_image'
        ]);
        $newImageName =null;
        if (request()->profile_pic!==null){
            $newImageName =time().'-'.auth()->user()->name.'-Userid-'.Auth::user()->id.'-profile-pic'.'.'.request()->profile_pic->extension();
            request()->profile_pic->move(public_path('profile_image'),$newImageName);
            $attributes['profile_pic']=$newImageName;
        }


User::where('id',$id)->update($attributes);



        return redirect('/');

    }
}
