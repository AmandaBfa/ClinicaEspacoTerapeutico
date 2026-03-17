<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Feedback;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalServices = Service::count();
        $mensagensPendentes = Feedback::where('lido', false)->count();
        $totalFeedbacks = Feedback::count();

        return view('admin.dashboard', compact('mensagensPendentes', 'totalEmployees', 'totalServices', 'totalFeedbacks'));
    }
}
