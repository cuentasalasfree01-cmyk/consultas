<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class DashboardController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $clientsCount = Client::count();
            return view('dashboard.admin', compact('clientsCount'));
        } else {
            $procedures = $user->client ? $user->client->procedures : collect();
            return view('dashboard.client', compact('procedures'));
        }
    }
}
