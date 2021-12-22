<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function Authentication(){
        return view('authentication.index');
    }

    public function Login(Request $request){
        $formData = 1;
        return $formData;
    }

    public function Register(Request $request){
        $user = User::where('email' , $request['emailRegister'])->first();
        $user->email = $request['emailRegister'];
        $user->save();
        return response()->json(['success' => true]);
    }

}
