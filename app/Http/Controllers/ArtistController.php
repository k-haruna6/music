<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        return view('artist.index');
    }
    
    public function add()
    {
        return view('artist.create');
    }

    public function create()
    {
        return redirect('artist/create');
    }

    public function edit()
    {
        return view('artist.edit');
    }

    public function update()
    {
        return redirect('artist/edit');
    }
}
