<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function reg(Request $request)
    {
        $reg = $request->all();
        User::create([
            "name" => $reg["name"],
            "email" => $reg["email"],
            "password" => $reg["password"],

        ]);
        return view("auth");
    }

    public function index(){
        return view("reg");
    }

    // $request - все данные отправляемые
    public function auth(Request $request){
        $request-> validate([
            "email"=>"required",
            "password"=>"reqiured"
        ],[
            "email.reqiured"=>"Поле обязательно для заполнения",
            "password.reqiured"=>"Поле обязательно для заполнения",
        ]);
        $user = $request->only(["email", "password"]);
        if(Auth::attempt($user)){
            return redirect("home");
        } else {
            return redirect()->back()->with("erroe", "Неверный логин или пароль");
        }
    }
    public function index_auth(){
        return view('auth');
    }
}
