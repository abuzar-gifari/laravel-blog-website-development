<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class LoginController extends Controller
{
    public function registration(){
        return view('user_auth.registration');
    }
    public function login(){
        return view('user_auth.login');
    }

    public function doRegistration(Request $request){
        // dd($request->all());
        $inputs=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];

        User::create($inputs);
        return redirect()->route('login');
    }
    public function doLogin(Request $request){
        // dd($request->all());
        $creds=$request->except('_token');
        if (\auth()->attempt($creds)) {
            if (auth()->user()->role=="Admin") {
                return redirect()->route('admin.dashboard');
            }else {
                return redirect()->route('website');
            }
        }
    }

    public function doLogout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
