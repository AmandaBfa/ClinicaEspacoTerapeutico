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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration_minutes' => 'required|integer',
        ]);

        $service = new Service($request->all());
        $service->slug = Str::slug($request->name);
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration_minutes' => 'required|integer',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());
        $service->slug = Str::slug($request->name);
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Serviço atualizado com sucesso!');
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Serviço excluído com sucesso!');
    }

    // public function show($slug)
    // {
    //     $service = Service::where('slug', $slug)->firstOrFail();
        
    //     return view('admin.services.show', compact('service'));
    // }

}
