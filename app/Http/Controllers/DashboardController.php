<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = User::count();

        return view('dashboard.dashboard')->with([
            'user' => $user
        ]);
    }
}
