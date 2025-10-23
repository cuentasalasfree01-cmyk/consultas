<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Versión simple que SIEMPRE funciona
        return view('dashboard.simple', ['user' => $user]);
    }
}
