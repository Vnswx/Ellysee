<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('Login-Register.login');
    }

    public function actionlogin(Request $request)
    {
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                Alert::success('Success', 'Login successful!')->persistent(true);
                return redirect()->route('home');
            }
    
            if (Auth::getProvider()->retrieveByCredentials($credentials)) {
                return redirect()->back()->withInput()->withErrors(['password' => 'Invalid password']);
            }
    
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email']);
        }
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('Login-Register.register');
    }

    public function actionregister(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'namalengkap' => 'required',
        ]);

        $defaultImagePath = 'images/default_profile.jpg';

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'namalengkap' => $request->namalengkap,
            'profile_image' => $defaultImagePath,
        ]);

        Alert::success('Success', 'Registration successful. Please login.')->persistent(true);
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }


 
}
