<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\Models\UserModel;

class UserController extends Controller
{

    public function UserLoginView()
    {
        return view('user.user_login');
    }

    public function UserLogin(request $request)
    {
        //Input Validation
        $validated = $request->validate([
            'username' => 'required|min:5|max:5',
            'password' => 'required|min:5|max:5'
        ]);

        //Check if username and password is correct
        if($request->input('username') != "ADMIN" && $request->input('password') != "admin")
        {
            return redirect('/');
        }else{
            //If user is vaidated & credential match, username is stored in a session and user is redirected to the dashboard
            $request->session()->put('user', $request->input('username'));
            return redirect('/items-dashboard');
        }

    }

}
