<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $data = [
            'page' => 'Home',
            'mode' => 'pelanggan'
        ];
        return view('customer.dashboard', $data);
    }
}
