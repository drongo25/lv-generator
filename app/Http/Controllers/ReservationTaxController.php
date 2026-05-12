<?php

namespace App\Http\Controllers;

use App\Models\ReservationTax;
use App\Http\Requests\CreateReservationTaxRequest;
use App\Http\Requests\UpdateReservationTaxRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationTaxController extends Controller
{
    public function index(Request $request)
    {
        $reservationTaxes = ReservationTax::paginate(15);
        return view('reservation_taxes.index', compact('reservationTaxes'));
    }

    public function create()
    {
        return view('reservation_taxes.create');
    }

    public function store(CreateReservationTaxRequest $request)
    {
        ReservationTax::create($request->validated());
        return redirect()->route('reservation-taxes.index')
            ->with('success', 'ReservationTax created successfully.');
    }

    public function show($id)
    {
        $reservationTax = ReservationTax::findOrFail($id);
        return view('reservation_taxes.show', compact('reservationTax'));
    }

    public function edit($id)
    {
        $reservationTax = ReservationTax::findOrFail($id);
        return view('reservation_taxes.edit', compact('reservationTax'));
    }

    public function update($id, UpdateReservationTaxRequest $request)
    {
        $reservationTax = ReservationTax::findOrFail($id);
        $reservationTax->update($request->validated());
        return redirect()->route('reservation-taxes.index')
            ->with('success', 'ReservationTax updated successfully.');
    }

    public function destroy($id)
    {
        ReservationTax::findOrFail($id)->delete();
        return redirect()->route('reservation-taxes.index')
            ->with('success', 'ReservationTax deleted successfully.');
    }
}