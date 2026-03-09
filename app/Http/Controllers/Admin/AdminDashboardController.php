<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $mensagensPendentes = \App\Models\Feedback::where('lido', false)->count();

        return view('admin.dashboard', compact('mensagensPendentes'));
    }
}
