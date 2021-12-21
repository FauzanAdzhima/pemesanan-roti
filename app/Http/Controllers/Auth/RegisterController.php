<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
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
}
