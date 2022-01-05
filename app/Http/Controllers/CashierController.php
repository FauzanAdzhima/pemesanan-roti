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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = Menu::latest()->get();
        $account = Cashier::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Kasir',
                'mode' => Auth::user()->role,
                'name' => Auth::user()->name,
                'image' => $acc->image
            ];

            $status = $acc->status;
        }

        if ($status == 'Aktif') {
            return view('cashier.dashboard', compact('menu'), $data);
        } else {
            session()->flush();
            return view('cashier.deactivated');
        }
    }

    public function menu()
    {
        $menu = Menu::latest()->get();
        $account = Cashier::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Menu List',
                'mode' => Auth::user()->role,
                'name' => Auth::user()->name,
                'image' => $acc->image
            ];

            $status = $acc->status;
        }

        if ($status == 'Aktif') {
            return view('cashier.menu', compact('menu'), $data);
        } else {
            session()->flush();
            return view('cashier.deactivated');
        }
    }

    public function menuSave(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|unique:App\Models\Menu,nama',
            'harga' => 'required|numeric',
            'image' => 'image|file|max:1024'
        ]);

        $image = '';

        if ($request->file('image')) {
            $image = $request->file('image')->store('menu-images');
        } else {
            $image = 'menu-images/default-food.jpg';
        }

        $menu = Menu::create([
            'nama' => $request->nama,
            'category_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => 'Tidak Tersedia',
            'terjual' => 0,
            'image' => $image,
        ]);

        if ($menu) {
            return redirect()->route('cashier-menu')->with([
                'success' => 'Data menu berhasil ditambah!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal menambah data menu!'
            ]);
        }
    }

    public function menuEditUpdate(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $this->validate($request, [
            'nama' => 'required|string|max:20',
            'harga' => 'required|integer|numeric',
            'image' => 'image|file|max:1024'
        ]);

        $image = $menu->image;

        if ($request->file('image')) {
            $image = $request->file('image')->store('menu-images');
        }

        $menu->update([
            'nama' => $request->nama,
            'category_id' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => $request->status,
            'terjual' => $request->terjual,
            'image' => $image
        ]);

        if ($menu) {
            return redirect()->route('cashier-menu')->with([
                'success' => 'Data menu berhasil diubah!'
            ]);
        } else {
            return redirect()->route('cashier-menu')->with([
                'error' => 'Gagal mengubah data menu!'
            ]);
        }
    }

    public function menuDestroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        if ($menu) {
            return redirect()->route('cashier-menu')->with([
                'success' => 'Data menu berhasil dihapus!'
            ]);
        } else {
            return redirect()->route('cashier-menu')->with([
                'error' => 'Data menu gagal dihapus!'
            ]);
        }
    }

    public function menuEdit($id)
    {
        $menu = Menu::findOrFail($id);
        $account = Cashier::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Edit Menu',
                'mode' => Auth::user()->role,
                'name' => Auth::user()->name,
                'image' => $acc->image
            ];

            $status = $acc->status;
        }

        if ($status == 'Aktif') {
            return view('cashier.edit-menu', compact('menu'), $data);
        } else {
            session()->flush();
            return view('cashier.deactivated');
        }
    }

    public function profile()
    {
        $auth_email = Auth::user()->email;
        $cashier_email = DB::table('cashiers')->select('id')->where('email', $auth_email)->get();
        foreach ($cashier_email as $cashmail) {
            $cashier = Cashier::findOrFail($cashmail->id);
        }

        $account = Cashier::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Profil Kasir',
                'mode' => Auth::user()->role,
                'name' => Auth::user()->name,
                'image' => $acc->image
            ];
        }

        return view('cashier.profile', compact('cashier'), $data);
    }

    public function profileEdit(Request $request)
    {
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

    public function changePassword()
    {
        $cashier_email = DB::table('cashiers')->select('id')->where('email', Auth::user()->email)->get();
        foreach ($cashier_email as $cashmail) {
            $cashier = Cashier::findOrFail($cashmail->id);
        }

        $account = Cashier::where('email', Auth::user()->email)->get();
        foreach ($account as $acc) {
            $data = [
                'page' => 'Profil Kasir',
                'mode' => Auth::user()->role,
                'name' => Auth::user()->name,
                'image' => $acc->image
            ];
        }

        return view('cashier.password', compact('cashier'), $data);
    }

    public function editPassword(Request $request)
    {
        $auth_email = Auth::user()->email;
        $cashier_email = DB::table('cashiers')->select('id')->where('email', $auth_email)->get();
        foreach ($cashier_email as $cashmail) {
            $cashier = Cashier::findOrFail($cashmail->id);
        }

        $this->validate($request, [
            'new_pass' => 'required|alpha-num|min:8|confirmed'
        ]);

        $currcash_email = $cashier->email;
        $new_pass = Hash::make($request->new_pass);

        if (Hash::check($request->password, Auth::user()->password)) {
            if ($cashier) {
                DB::table('users')->where('email', $currcash_email)->update([
                    'password' => $new_pass
                ]);

                $cashier->update([
                    'password' => $new_pass
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