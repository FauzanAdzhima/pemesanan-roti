<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        $data = [
            'page' => 'Register',
            'mode' => 'tamu'
        ];
        return view('register', $data);
    }

    protected function validator(array $data) {
        return Validator::make($data, [          
            'role' => ['required', 'string', 'max:255'],
        ]);
    }
      
    protected function create(array $data) {
        return User::create([          
            'role' => $data['role'],
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nama' => 'required|string|max:20',
            'email' => 'required|email:dns|unique:App\Models\Customer,email',
            'kontak' => 'required|digits:12',
            'alamat' => 'nullable|string',
            'password' => 'required|alpha-num|min:8|confirmed'
        ]);        

        $password = Hash::make($request->password);

        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'password' => $password,
            'total_transaksi' => 0
        ]);

        if ($customer) {
            $role = 'pelanggan';
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'role' => $role
            ]);
            return redirect()->back()->with([
                'success' => 'Register berhasil! Silahkan login dengan akun baru anda.'
            ]);
            
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Register gagal!'
            ]);
        }
    }
}
