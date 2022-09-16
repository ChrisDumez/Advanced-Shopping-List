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
            'email' => 'required|email',
            'password' => 'required|min:5|max:15'
        ]);

        //Capupture input
        $email_search = $request->input('email');
        $password_search = $request->input('password');

        $searchdata = UserModel::where('email','LIKE','%'.$email_search.'%')->paginate(5);
        

        //returns login screen if email is not registered
        if($searchdata->isEmpty())
        {
            return view('user.user_login');
        }

        
        $username = $searchdata->pluck('username');
        $password = $searchdata->pluck('password');


        //checks if password is matching
        if($password = $password_search)
        {
            $request->session()->put('user', $username);
            return redirect('/items-dashboard');
        }

        return "Failed";

        return view('user.user_login');
    }

    public function UserRegistrationView()
    {
        return view('user.user_registration');
    }

    public function UserRegistration(request $request)
    {
        //Input Validation
        $validated = $request->validate([
            'username' => 'required|min:2|max:15',
            'email' => 'required|unique:user_models,email',
            'password' => 'required|confirmed|min:5|max:15'
        ]);
        
        //Capture input data
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $repeatpassword = $request->input('repeatpassword');

        //Save data into Database
        $user = new UserModel();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();


        return view ('user.user_login');
    }

}
