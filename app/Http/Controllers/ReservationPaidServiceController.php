<?php

namespace App\Http\Controllers;

use App\Models\ReservationPaidService;
use App\Http\Requests\CreateReservationPaidServiceRequest;
use App\Http\Requests\UpdateReservationPaidServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationPaidServiceController extends Controller
{
    public function index(Request $request)
    {
        $reservationPaidServices = ReservationPaidService::paginate(15);
        return view('reservation_paid_services.index', compact('reservationPaidServices'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $reservationPaidService->field ?? ''
        $reservationPaidService = new ReservationPaidService();
        return view('reservation_paid_services.create', compact('reservationPaidService'));
    }

    public function store(CreateReservationPaidServiceRequest $request)
    {
        ReservationPaidService::create($request->validated());
        return redirect()->route('reservation-paid-services.index')
            ->with('success', 'ReservationPaidService created successfully.');
    }

    public function show($id)
    {
        $reservationPaidService = ReservationPaidService::findOrFail($id);
        return view('reservation_paid_services.show', compact('reservationPaidService'));
    }

    public function edit($id)
    {
        $reservationPaidService = ReservationPaidService::findOrFail($id);
        return view('reservation_paid_services.edit', compact('reservationPaidService'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateReservationPaidServiceRequest $request, $id)
    {
        $reservationPaidService = ReservationPaidService::findOrFail($id);
        $reservationPaidService->update($request->validated());
        return redirect()->route('reservation-paid-services.index')
            ->with('success', 'ReservationPaidService updated successfully.');
    }

    public function destroy($id)
    {
        ReservationPaidService::findOrFail($id)->delete();
        return redirect()->route('reservation-paid-services.index')
            ->with('success', 'ReservationPaidService deleted successfully.');
    }
}