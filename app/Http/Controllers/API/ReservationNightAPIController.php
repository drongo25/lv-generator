<?php

namespace App\Http\Controllers\API;

use App\Models\ReservationNight;
use App\Http\Requests\API\CreateReservationNightAPIRequest;
use App\Http\Requests\API\UpdateReservationNightAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationNightAPIController extends AppBaseController
{
    /**
     * Display a listing of the ReservationNight.
     * GET /api/reservation_nights
     */
    public function index(Request $request): JsonResponse
    {
        $query = ReservationNight::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Reservation Nights retrieved successfully');
    }

    /**
     * Store a newly created ReservationNight.
     * POST /api/reservation_nights
     */
    public function store(CreateReservationNightAPIRequest $request): JsonResponse
    {
        $reservationNight = ReservationNight::create($request->all());
        return $this->sendResponse($reservationNight->toArray(), 'Reservation Night saved successfully');
    }

    /**
     * Display the specified ReservationNight.
     * GET /api/reservation_nights/{id}
     */
    public function show(int $id): JsonResponse
    {
        $reservationNight = ReservationNight::find($id);
        if (empty($reservationNight)) {
            return $this->sendError('Reservation Night not found');
        }
        return $this->sendResponse($reservationNight->toArray(), 'Reservation Night retrieved successfully');
    }

    /**
     * Update the specified ReservationNight.
     * PUT /api/reservation_nights/{id}
     */
    public function update(int $id, UpdateReservationNightAPIRequest $request): JsonResponse
    {
        $reservationNight = ReservationNight::find($id);
        if (empty($reservationNight)) {
            return $this->sendError('Reservation Night not found');
        }
        $reservationNight->fill($request->all())->save();
        return $this->sendResponse($reservationNight->toArray(), 'Reservation Night updated successfully');
    }

    /**
     * Remove the specified ReservationNight.
     * DELETE /api/reservation_nights/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $reservationNight = ReservationNight::find($id);
        if (empty($reservationNight)) {
            return $this->sendError('Reservation Night not found');
        }
        $reservationNight->delete();
        return $this->sendSuccess('Reservation Night deleted successfully');
    }
}