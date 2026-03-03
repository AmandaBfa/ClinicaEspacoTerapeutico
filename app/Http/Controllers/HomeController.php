<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::take(3)->get(); 
        $posts = Post::latest()->take(3)->get();

        return view('home', compact('services', 'posts'));
    }
}
