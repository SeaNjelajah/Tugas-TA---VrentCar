<?php

namespace App\Http\Controllers\Global;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function LoginView()
    {
        if (Auth::check())
            return redirect()->back();
        else
            return view('GlobalPage.Login');
    }  
      
    public function Login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only(['username', 'email', 'password']);
        
        $remember = $request->remember ? true : false;

        if (Auth::attempt($credentials, $remember)) {

            $request->session()->regenerate();
            
            $id = Auth::user()->id;
            $group = strtolower(User::find($id)->group);

            $MustEqual1 = "admin";
            $MustEqual2 = "member";

            if ($group == $MustEqual1) 
                return redirect()->intended(route('admin.dashboard.show'))->with('success', 'Signed in');
            
            else if ($group == $MustEqual2)
                return redirect()->intended(route('Home'))->with('success', 'Signed in');
        }

        return redirect(route("LoginView"))->withInput()->with('failed', 'Login details are not valid');
    }

    
    public function signOut(Request $request) {

        $request->session()->flush();
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return Redirect(route('LoginView'))->with('success', 'Log out Success');
    }
}
