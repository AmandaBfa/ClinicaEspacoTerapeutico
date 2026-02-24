<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // search for all services in the database
        $services = Service::all();

        // return the services to the view
        return view('services', compact('services'));
    }
}
