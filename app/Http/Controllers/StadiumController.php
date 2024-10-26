<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::all();
        return view('stadiums.index', compact('stadiums'));
    }

    public function show($id)
    {
        $stadium = Stadium::findOrFail($id);
        return view('stadiums.show', compact('stadium'));
    }

    public function create()
    {
        return view('stadiums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            // Ajoutez d'autres validations nécessaires
        ]);

        Stadium::create($request->all());
        return redirect()->route('stadiums.index')->with('success', 'Stadium created successfully.');
    }

    public function edit($id)
    {
        $stadium = Stadium::findOrFail($id);
        return view('stadiums.edit', compact('stadium'));
    }

    public function update(Request $request, $id)
    {
        $stadium = Stadium::findOrFail($id);
        $stadium->update($request->all());
        return redirect()->route('stadiums.index')->with('success', 'Stadium updated successfully.');
    }

    public function destroy($id)
    {
        $stadium = Stadium::findOrFail($id);
        $stadium->delete();
        return redirect()->route('stadiums.index')->with('success', 'Stadium deleted successfully.');
    }
}
