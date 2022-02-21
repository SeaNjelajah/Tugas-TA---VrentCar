<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function LoginView()
    {
        return view('AdminPage.ZTemplate.login');
    }  
      
    public function Login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only(['username', 'email', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard.show'))->with('success', 'Signed in');
        }
  
        return redirect(route("LoginView"))->withInput()->with('success', 'Login details are not valid');
    }

    
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect(route('LoginView'))->with('success', 'Log out Success');
    }
}
