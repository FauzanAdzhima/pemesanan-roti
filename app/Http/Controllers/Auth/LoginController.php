<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function formLogin() {
        $data = [
            'page' => 'Login',
            'mode' => 'tamu'
        ];
        return view('login', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email:dns|exists:users',
            'password'=>'required'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            $role = Auth::user()->role; 
                switch ($role) {
                    case 'admin':
                        return redirect('admin');
                        break;
                    case 'kasir':
                        return redirect('cashier');
                        break;
                    case 'pelanggan':
                        return redirect('customer');
                        break; 
                
                    default:
                        return '/'; 
                    break;
                }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
        
}