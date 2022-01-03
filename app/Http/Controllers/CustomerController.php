<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\Customer;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }    

    public function index() {
        $menu = Menu::get();
        $data = [
            'page' => 'Home',
            'mode' => Auth::user()->role,
        ];
        
        return view('customer.dashboard', compact('menu'), $data);
    }

    public function profile() {
        $customer_email = DB::table('customers')->select('id')->where('email', Auth::user()->email)->get();
        foreach ($customer_email as $custmail) {
            $customer = Customer::findOrFail($custmail->id);
        }

        $account = Customer::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Profil Pelanggan',
                'mode' => Auth::user()->role
            ];
        }
        
        return view('customer.profile', compact('customer'), $data);
    }

    public function profileEdit(Request $request) {
        $customer_email = DB::table('customers')->select('id')->where('email', Auth::user()->email)->get();
        foreach ($customer_email as $custmail) {
            $customer = Customer::findOrFail($custmail->id);
        }
        
        $this->validate($request, [
            'nama' => 'required|string|max:20',
            'kontak' => 'required|digits:12',
            'email' => 'required|email:dns',
            'alamat' => 'required|string'
        ]);

        $currcust_email = $customer->email;

        if (Hash::check($request->password, Auth::user()->password)) {
            $customer->update([
                'nama' => $request->nama,
                'kontak' => $request->kontak,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);

            if ($customer) {
                DB::table('users')->where('email', $currcust_email)->update([
                    'name' => $request->nama,
                    'email' => $request->email,
                ]);
    
                return redirect()->route('customer-profile')->with([
                    'success' => 'Edit data pelanggan berhasil!'
                ]);
            } else {
                    return redirect()->back()->with([
                        'error' => 'Edit data pelanggan gagal!'
                    ]);
            }
        }
    }

    public function changePassword() {
        $customer_email = DB::table('customers')->select('id')->where('email', Auth::user()->email)->get();
        foreach ($customer_email as $custmail) {
            $customer = Customer::findOrFail($custmail->id);
        }
        
        $account = Customer::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Profil Pelanggan',
                'mode' => Auth::user()->role
            ];
        }
                
        return view('customer.password', compact('customer'), $data);
    }

    public function editPassword(Request $request) {
        $customer_email = DB::table('customers')->select('id')->where('email', Auth::user()->email)->get();
        foreach ($customer_email as $custmail) {
            $customer = Customer::findOrFail($custmail->id);
        }
        
        $this->validate($request, [            
            'new_pass' => 'required|alpha-num|min:8|confirmed'
        ]);

        $currcust_email = $customer->email;
        $new_pass = Hash::make($request->new_pass);       

        if (Hash::check($request->password, Auth::user()->password)) {
            if ($customer) {
                DB::table('users')->where('email', $currcust_email)->update([
                    'password' => $new_pass
                ]);

                $customer->update([
                    'password' => $new_pass
                ]);

                return redirect()->route('customer-profile')->with([
                    'success' => 'Edit data pelanggan berhasil!'
                ]);
            }
        } else {
                return redirect()->back()->with([
                    'error' => 'Edit data pelanggan gagal!'
                ]);
        }    
    }
}