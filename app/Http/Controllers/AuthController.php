<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function Authentication(){
        return view('authentication.index');
    }

    public function index()
    {
        if (Auth::user()) {
            return redirect()->route('home');
        }

        return view('authentication.login');
    }

    public function Login(Request $request){
        
            if(Auth::attempt([
                'email' => $request->email_login,
                'password' => $request->password_login,
                'is_confirm' => 2 
            ])){
                return redirect()->route('home');
            }
    
            return redirect()->route('auth.authentication')->with('error', 'Incorrect email or password !');
        }

    public function Register(RegisterValidate $request){
        $user = new User;
        $user->email = $request->email_register;
        $user->password = Hash::make($request->password_register);
        $user->name = $request->name;
        $user->is_confirm = 1;
        
        $user->save();
        $mailReceiver = $request->email_register;

        $message = [''];
        SendEmail::dispatch($message, $mailReceiver);
        return view('authentication.mail_confirm');
    }

    public function Logout(){
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('auth.authentication');
    }

    public function emailConfirm()
    {
        $id = auth()->user()->id;
        $user = User::where('id',$id )->first();
        $user->is_confirm = 2;
        $user->save();

        return redirect()->route('home');
    }

}
