<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login_view(){
        return view('frontend.user.login');
    }
    public function user_register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
        ]);

        User::create($request->except('_token')+[
            'role' => "viewer",
            'password'=> Hash::make($request->password),
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password,])){
            return redirect(route('index'));
        }
        else{
            return back()->with('credi_error','your credintial doesnot match');
        }
    }

    public function user_login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt(['email' => $request->email,'password' => $request->password,])){
            return redirect(route('index'));
        }
        else{
            return back()->with('crede_error','your credential doesnot match');
        }
    }

    public function user_logout(){
        Auth::logout();
        return redirect(route('index'));
    }


}
