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
            'mode' => 'pelanggan'
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
                        return '/home'; 
                    break;
                }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 'admin':
            return '/admin';
            break;
          case 'pelanggan':
            return '/customer';
            break; 
      
          default:
            return '/home'; 
          break;
        }
      }
}
