<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function RegisterView()
    {
      if (Auth::check())
        return redirect()->back();
      else
        return view('GlobalPage.Register');
    }
      
    public function Register(Request $request)
    { 
      $request->validate([
          'username' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:6',
      ]);
    
      $data = $request->all();
      $this->create($data);
      
      return redirect(route('LoginView'))->with('Created', 'Successfull to registered your new account');
    }


    public function create(array $data)
    {
      return User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'group' => 'member'
      ]);

    }    
}
