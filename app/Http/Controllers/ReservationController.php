<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\CreateReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $reservations = Reservation::paginate(15);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(CreateReservationRequest $request)
    {
        Reservation::create($request->validated());
        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update($id, UpdateReservationRequest $request)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->validated());
        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();
        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully.');
    }
}