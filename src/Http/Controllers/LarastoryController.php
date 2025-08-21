<?php

namespace Larastory\Http\Controllers;

use Illuminate\Routing\Controller;

class LarastoryController extends Controller
{
    public function index()
    {
        dd('test');
        return view('larastory::app');
    }

    public function component($component)
    {
        // TODO: Load and display specific component
        return view('larastory::app', compact('component'));
    }

    public function listComponents()
    {
        // TODO: Return JSON list of all components
        return response()->json([
            'components' => [
                'button' => ['name' => 'Button', 'type' => 'blade'],
                'card' => ['name' => 'Card', 'type' => 'blade'],
                'input' => ['name' => 'Input', 'type' => 'livewire'],
            ]
        ]);
    }

    public function getStories($component)
    {
        // TODO: Return JSON list of stories for a component
        return response()->json([
            'stories' => [
                'default' => ['name' => 'Default', 'props' => []],
                'primary' => ['name' => 'Primary', 'props' => ['variant' => 'primary']],
                'secondary' => ['name' => 'Secondary', 'props' => ['variant' => 'secondary']],
            ]
        ]);
    }
}