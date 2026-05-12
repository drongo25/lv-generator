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
        // FIX: передаём пустую модель — _fields использует $reservationTax->field ?? ''
        $reservationTax = new ReservationTax();
        return view('reservation_taxes.create', compact('reservationTax'));
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

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateReservationTaxRequest $request, $id)
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