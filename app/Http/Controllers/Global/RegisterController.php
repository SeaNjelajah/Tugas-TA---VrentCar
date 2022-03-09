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
      
    public function Registration(Request $request)
    {  
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,name',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin.dashboard.show")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);

    }    
}
