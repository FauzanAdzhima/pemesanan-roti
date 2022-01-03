<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index() {
        $menu = Menu::get();
        $data = [
            'page' => 'Home',
            'mode' => 'tamu',
        ];
        return view('customer.dashboard', compact('menu'), $data);
    }
}
