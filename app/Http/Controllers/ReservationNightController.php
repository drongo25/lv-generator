<?php

namespace App\Http\Controllers;

use App\Models\ReservationNight;
use App\Http\Requests\CreateReservationNightRequest;
use App\Http\Requests\UpdateReservationNightRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationNightController extends Controller
{
    public function index(Request $request)
    {
        $reservationNights = ReservationNight::paginate(15);
        return view('reservation_nights.index', compact('reservationNights'));
    }

    public function create()
    {
        return view('reservation_nights.create');
    }

    public function store(CreateReservationNightRequest $request)
    {
        ReservationNight::create($request->validated());
        return redirect()->route('reservation-nights.index')
            ->with('success', 'ReservationNight created successfully.');
    }

    public function show($id)
    {
        $reservationNight = ReservationNight::findOrFail($id);
        return view('reservation_nights.show', compact('reservationNight'));
    }

    public function edit($id)
    {
        $reservationNight = ReservationNight::findOrFail($id);
        return view('reservation_nights.edit', compact('reservationNight'));
    }

    public function update($id, UpdateReservationNightRequest $request)
    {
        $reservationNight = ReservationNight::findOrFail($id);
        $reservationNight->update($request->validated());
        return redirect()->route('reservation-nights.index')
            ->with('success', 'ReservationNight updated successfully.');
    }

    public function destroy($id)
    {
        ReservationNight::findOrFail($id)->delete();
        return redirect()->route('reservation-nights.index')
            ->with('success', 'ReservationNight deleted successfully.');
    }
}