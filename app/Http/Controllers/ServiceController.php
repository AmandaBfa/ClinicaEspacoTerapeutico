<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        // search for all services in the database
        $services = Service::all();

        // return the services to the view
        return view('admin.services.index', compact('services'));
    }

    public function indexPublic()
    {
        $services = Service::latest()->paginate(3); 
        return view('services', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'duration_minutes' => 'required|integer',
        ]);

        $service = new Service($request->all());
        $service->slug = Str::slug($request->name);
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Serviço criado!');
    }

}
