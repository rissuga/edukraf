<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function logout() {
        Auth('web')->logout();;
        return Redirect()->route('login');
    }
}
