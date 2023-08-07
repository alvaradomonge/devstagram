<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        //dd($request);
        //se reescribe usernamen para darle formato de url, slug es el método
        //sino se hace en este punto salta la validación y da un error de framework
        $request->request->add(['username'=>Str::slug($request->username)]);
        $this->validate($request,[
            'name'=> 'required|max:30',
            'username'=> 'required|unique:users|min:3|max:20',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6'
        ]);
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        //autenticar usuario
        // auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);
        //otra forma
        auth()->attempt($request->only('email','password'));
        return redirect()->route('post.index');
    }

    
}
