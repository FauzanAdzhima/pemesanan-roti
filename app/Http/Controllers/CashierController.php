<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $menu = Menu::latest()->get();
        $account = Cashier::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {            
            $data = [
                'page' => 'Kasir',
                'mode' => Auth::user()->role,
                'name' => Auth::user()->name,
                'image' => $acc->image
            ];
        }
        
        return view('cashier.dashboard', compact('menu'), $data);
    }

    public function profile() {        
        $auth_email = Auth::user()->email;
        $cashier_email = DB::table('cashiers')->select('id')->where('email', $auth_email)->get();
        foreach ($cashier_email as $cashmail) {            
            $cashier = Cashier::findOrFail($cashmail->id);
        }        
        $data = [
            'page' => 'Cashier Profile',
            'mode' => Auth::user()->role,
            'name' => Auth::user()->name
        ];
        return view('cashier.profile', compact('cashier'), $data);        
    }

    public function profileEdit(Request $request) {
        $auth_email = Auth::user()->email;
        $cashier_email = DB::table('cashiers')->select('id')->where('email', $auth_email)->get();
        foreach ($cashier_email as $cashmail) {            
            $cashier = Cashier::findOrFail($cashmail->id);
        }
        
        $this->validate($request, [
            'nama' => 'required|string|max:20',
            'nik' => 'required|digits:12',
            'email' => 'required|email:dns',            
        ]);

        $currcash_email = $cashier->email;                

        if (Hash::check($request->password, Auth::user()->password)) {            
            $cashier->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'email' => $request->email,
            ]);
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            if ($cashier) {
                DB::table('users')->where('email', $currcash_email)->update([
                    'name' => $request->nama,
                    'email' => $request->email,                    
                ]);

                return redirect()->route('cashier-profile')->with([
                    'success' => 'Edit data kasir berhasil!'
                ]);
            }
        } else {
                return redirect()->back()->with([
                    'error' => 'Edit data kasir gagal!'
                ]);
        }
    }

    public function changePassword() {
        $cashier_email = DB::table('cashiers')->select('id')->where('email', Auth::user()->email)->get();
        foreach ($cashier_email as $cashmail) {            
            $cashier = Cashier::findOrFail($cashmail->id);
        }         
        $data = [
            'page' => 'Cashier Profile',
            'mode' => Auth::user()->role,
            'name' => Auth::user()->name
        ];
        return view('cashier.password', compact('cashier'), $data);
    }

    public function editPassword(Request $request) {
        $auth_email = Auth::user()->email;
        $cashier_email = DB::table('cashiers')->select('id')->where('email', $auth_email)->get();
        foreach ($cashier_email as $cashmail) {            
            $cashier = Cashier::findOrFail($cashmail->id);
        }
        
        $this->validate($request, [            
            'new_pass' => 'required|alpha-num|min:8|confirmed'
        ]);

        $currcash_email = $cashier->email;                

        if (Hash::check($request->password, Auth::user()->password)) {            
            $cashier->update([
                'password' => $request->new_pass,
            ]);
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            if ($cashier) {
                DB::table('users')->where('email', $currcash_email)->update([
                    'password' => $request->new_pass,                    
                ]);

                return redirect()->route('cashier-profile')->with([
                    'success' => 'Edit data kasir berhasil!'
                ]);
            }
        } else {
                return redirect()->back()->with([
                    'error' => 'Edit data kasir gagal!'
                ]);
        }
    }
}