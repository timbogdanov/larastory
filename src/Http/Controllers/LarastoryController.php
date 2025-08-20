<?php

namespace Larastory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LarastoryController extends Controller
{
    public function index()
    {
        return view('larastory::app');
    }

    public function component($component)
    {
        // TODO: Load and display specific component
        return view('larastory::app', compact('component'));
    }
}