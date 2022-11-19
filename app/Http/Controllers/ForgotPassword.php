<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPassword extends Controller
{
    public function show()
    {
        return view('sessions.forgot-password');
    }
}
