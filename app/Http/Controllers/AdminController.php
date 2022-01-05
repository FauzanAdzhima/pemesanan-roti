<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\User;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cashier = Cashier::get();
        $role = Auth::user()->role;
        $data = [
            'page' => 'Admin',
            'mode' => $role
        ];
        return view('admin.dashboard', compact('cashier'), $data);
    }

    public function create()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required|string|max:20',
            'nik' => 'required|digits:12|unique:App\Models\Cashier,nik',
            'email' => 'required|email:dns|unique:App\Models\Cashier,email',
            'image' => 'image|file|max:1024',
        ]);

        $image = '';

        if ($request->file('image')) {
            $image = $request->file('image')->store('cashier-images');
        }

        $password = Hash::make('password');

        $cashier = Cashier::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'image' => $image,
            'password' => $password,
            'status' => 'Aktif'
        ]);

        if ($cashier) {
            $role = 'kasir';
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'role' => $role
            ]);
            return redirect()->route('admin.index')->with([
                'success' => 'Data pegawai kasir berhasil ditambah!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Gagal menambah data pegawai kasir!'
            ]);
        }
    }

    public function edit($id)
    {
        $cashier = Cashier::findOrFail($id);
        $role = Auth::user()->role;
        $data = [
            'page' => 'Edit Kasir',
            'mode' => $role
        ];
        return view('admin.cashier_edit', compact('cashier'), $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'string|max:20',
            'nik' => 'digits:12',
            'email' => 'email:dns',
            'status' => ''
        ]);

        $cashier = Cashier::findOrFail($id);

        $current_cashier = DB::table('cashiers')->select('email')->where('id', $id)->get();

        $cashier->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'status' => $request->status
        ]);

        if ($cashier) {
            foreach ($current_cashier as $currcash) {
                DB::table('users')->where('email', $currcash->email)->update([
                    'name' => $request->nama,
                    'email' => $request->email,
                ]);
            }
            return redirect()->route('admin.index')->with([
                'success' => 'Edit data pegawai berhasil!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'error' => 'Edit data pegawai gagal!'
            ]);
        }
    }

    public function destroy($id)
    {
        $cashier = Cashier::findOrFail($id);
        $current_cashier = DB::table('cashiers')->select('email')->where('id', $id)->get();
        $cashier->delete();

        if ($cashier) {
            foreach ($current_cashier as $currcash) {
                DB::table('users')->where('email', $currcash->email)->delete();
            }

            return redirect()->route('admin.index')->with([
                'success' => 'Data pegawai kasir berhasil dihapus!'
            ]);
        } else {
            return redirect()->route('admin.index')->with([
                'error' => 'Data pegawai gagal dihapus!'
            ]);
        }
    }

    public function profile()
    {
        $admin = Administrator::findOrFail(1);
        $role = Auth::user()->role;
        $data = [
            'page' => 'Admin Profile',
            'mode' => $role
        ];
        return view('admin.profile', compact('admin'), $data);
    }

    public function profileEdit(Request $request)
    {
        $admin = Administrator::findOrFail(1);
        $this->validate($request, [
            'nama' => 'required|string|max:20',
            'nohp' => 'required|digits:12',
            'email' => 'required|email:dns',
        ]);

        $current_admin = DB::table('administrators')->select('email')->where('id', 1)->get();

        if (Hash::check($request->password, Auth::user()->password)) {
            $admin->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'email' => $request->email,
            ]);
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            if ($admin) {
                foreach ($current_admin as $currad) {
                    DB::table('users')->where('email', $currad->email)->update([
                        'name' => $request->nama,
                        'email' => $request->email,
                        // 'password' => $new_pass
                    ]);
                }

                return redirect()->route('admin-profile')->with([
                    'success' => 'Edit data admin berhasil!'
                ]);
            }
        } else {
            return redirect()->back()->with([
                'error' => 'Edit data admin gagal!'
            ]);
        }
    }

    public function changePassword()
    {
        $admin = Administrator::findOrFail(1);
        $role = Auth::user()->role;
        $data = [
            'page' => 'Admin Profile',
            'mode' => $role
        ];
        return view('admin.password', compact('admin'), $data);
    }

    public function editPassword(Request $request)
    {
        $admin = Administrator::findOrFail(1);
        $this->validate($request, [
            'new_pass' => 'required|alpha-num|min:8|confirmed'
        ]);

        $current_admin = DB::table('administrators')->select('email')->where('id', 1)->get();

        $new_pass = Hash::make($request->new_pass);

        if (Hash::check($request->password, Auth::user()->password)) {
            $admin->update([
                'password' => $new_pass
            ]);
        }

        if (Hash::check($request->password, Auth::user()->password)) {
            if ($admin) {
                foreach ($current_admin as $currad) {
                    DB::table('users')->where('email', $currad->email)->update([
                        'password' => $new_pass
                    ]);
                }

                return redirect()->route('admin-profile')->with([
                    'success' => 'Edit data admin berhasil!'
                ]);
            }
        } else {
            return redirect()->route('admin-profile')->with([
                'error' => 'Edit data admin gagal!'
            ]);
        }
    }
}