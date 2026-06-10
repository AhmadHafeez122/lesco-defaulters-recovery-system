<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // رجسٹر صفحہ دکھائیں
    public function showRegister()
    {
        return view('auth.register');
    }

    // صارف کو رجسٹر کریں
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'رجسٹریشن کامیاب!');
    }

    // لاگ ان صفحہ دکھائیں
    public function showLogin()
    {
        return view('auth.login');
    }

    // صارف کو لاگ ان کریں
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'غلط ای میل یا پاسورڈ'])->onlyInput('email');
    }

    // صارف کو لاگ آؤٹ کریں
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'آپ لاگ آؤٹ ہو گئے ہیں!');
    }
}
