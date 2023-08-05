<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){
        $attributes = request()->validate(

            [
                'name'=>['required','max:255'],
                'email'=>['required','email'],
                'password'=>['required','min:7','max:255']
            ]
        );
        $user=User::create($attributes);

        auth()->login($user);

        return redirect('/');
    }

}
