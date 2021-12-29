<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //update avatar
    public function UpdateAvt(Request $request){
        $idUser = auth()->user()->id;
        $User = User::where('id', $idUser)->first();
        
        $path = $request->file('image');
        $storedPath = $path->move('avatars', $path->getClientOriginalName());
        
        $User->avatar_url = $storedPath;
        $User->save();
        return redirect()->route('home');
    }

    //show image
     public function Image()
    {
        return view('home.image_storage');
    }
    
}
