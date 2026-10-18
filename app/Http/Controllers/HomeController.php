<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(6)->get();
        $services = Service::latest()->take(4)->get();

        return view('home', compact(
            'artikels',
            'galeris',
            'services'
        ));
    }
}
