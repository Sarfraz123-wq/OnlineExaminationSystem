<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function loadRegister(){
        return view('form');
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'string|min:3|required',
            'email' => 'string|email|required',
            'password' => 'string|min:8|max:12|required|unique:users',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect('/login');
    }
    public function loadLogin(){
        return view('login');
    }
    public function Login(Request $request){
        $credential = $request->only('email','password');
        if(Auth::attempt($credential)){
            if(Auth::user()->is_admin == 1){
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/dashboard');
            }
        }
        else{
            echo 'invalid';
        }
    }
    public function loadAdminDashboard(){
        return view('admin.dashboard');
    }

    public function loadDashboard(){
        return view('Student.dashboard');
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
