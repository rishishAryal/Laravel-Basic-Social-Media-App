<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(){


        $postsWithUsers = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->orderBy('posts.created_at', 'DESC') // Sort by the 'created_at' column in the 'posts' table
            ->get();


//dd($postsWithUsers->profile_pic);



        return view('index.index',
            ['postsWithUsers'=>$postsWithUsers,
                'users'=>User::get(),
                'count'=>Post::count()]);


    }
}
