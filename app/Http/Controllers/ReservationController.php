<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'stadium_id' => 'required|exists:stadiums,id',
            // Ajoutez d'autres validations nécessaires
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
