<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    public function index()
    {
        $adresses = Adresse::all();
        return view('adresses.index', compact('adresses'));
    }

    public function show($id)
    {
        $adresse = Adresse::findOrFail($id);
        return view('adresses.show', compact('adresse'));
    }

    public function create()
    {
        return view('adresses.create');
    }

    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'po_box' => 'nullable|string|max:255',
            // Ajoutez d'autres validations nécessaires
        ]);

        Adresse::create($request->all());
        return redirect()->route('adresses.index')->with('success', 'Adresse created successfully.');
    }

    public function edit($id)
    {
        $adresse = Adresse::findOrFail($id);
        return view('adresses.edit', compact('adresse'));
    }

    public function update(Request $request, $id)
    {
        $adresse = Adresse::findOrFail($id);
        $adresse->update($request->all());
        return redirect()->route('adresses.index')->with('success', 'Adresse updated successfully.');
    }

    public function destroy($id)
    {
        $adresse = Adresse::findOrFail($id);
        $adresse->delete();
        return redirect()->route('adresses.index')->with('success', 'Adresse deleted successfully.');
    }
}
