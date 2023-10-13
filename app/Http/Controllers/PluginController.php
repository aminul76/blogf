<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plugin;

class PluginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index()
    {
        $plugins = Plugin::all();
        return view('backend.plugins.index', compact('plugins'));
    }

    public function create()
    {
        return view('backend.plugins.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plugin_name' => 'required|string|max:255',
            'header_code' => 'nullable|string',
            'body_code' => 'nullable|string',
            'status' => 'required',
        ]);

        Plugin::create($validatedData);

        return redirect()->route('plugins.index')->with('success', 'Plugin created successfully!');
    }

    public function edit(Plugin $plugin)
    {
        return view('backend.plugins.edit', compact('plugin'));
    }

    public function update(Request $request, Plugin $plugin)
    {
        $validatedData = $request->validate([
            'plugin_name' => 'required|string|max:255',
            'header_code' => 'nullable|string',
            'body_code' => 'nullable|string',
            'status' => 'required',
        ]);

        $plugin->update($validatedData);

        return redirect()->route('plugins.index')->with('success', 'Plugin updated successfully!');
    }

    public function destroy(Plugin $plugin)
    {
        $plugin->delete();

        return redirect()->route('plugins.index')->with('success', 'Plugin deleted successfully!');
    }

}
