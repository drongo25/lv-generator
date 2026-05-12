<?php

namespace App\Http\Controllers\API;

use App\Models\Reservation;
use App\Http\Requests\API\CreateReservationAPIRequest;
use App\Http\Requests\API\UpdateReservationAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationAPIController extends AppBaseController
{
    /**
     * Display a listing of the Reservation.
     * GET /api/reservations
     */
    public function index(Request $request): JsonResponse
    {
        $query = Reservation::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Reservations retrieved successfully');
    }

    /**
     * Store a newly created Reservation.
     * POST /api/reservations
     */
    public function store(CreateReservationAPIRequest $request): JsonResponse
    {
        $reservation = Reservation::create($request->all());
        return $this->sendResponse($reservation->toArray(), 'Reservation saved successfully');
    }

    /**
     * Display the specified Reservation.
     * GET /api/reservations/{id}
     */
    public function show(int $id): JsonResponse
    {
        $reservation = Reservation::find($id);
        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }
        return $this->sendResponse($reservation->toArray(), 'Reservation retrieved successfully');
    }

    /**
     * Update the specified Reservation.
     * PUT /api/reservations/{id}
     */
    public function update(int $id, UpdateReservationAPIRequest $request): JsonResponse
    {
        $reservation = Reservation::find($id);
        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }
        $reservation->fill($request->all())->save();
        return $this->sendResponse($reservation->toArray(), 'Reservation updated successfully');
    }

    /**
     * Remove the specified Reservation.
     * DELETE /api/reservations/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $reservation = Reservation::find($id);
        if (empty($reservation)) {
            return $this->sendError('Reservation not found');
        }
        $reservation->delete();
        return $this->sendSuccess('Reservation deleted successfully');
    }
}