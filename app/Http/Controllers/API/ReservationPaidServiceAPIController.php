<?php

namespace App\Http\Controllers\API;

use App\Models\ReservationPaidService;
use App\Http\Requests\API\CreateReservationPaidServiceAPIRequest;
use App\Http\Requests\API\UpdateReservationPaidServiceAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationPaidServiceAPIController extends AppBaseController
{
    /**
     * Display a listing of the ReservationPaidService.
     * GET /api/reservation_paid_services
     */
    public function index(Request $request): JsonResponse
    {
        $query = ReservationPaidService::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Reservation Paid Services retrieved successfully');
    }

    /**
     * Store a newly created ReservationPaidService.
     * POST /api/reservation_paid_services
     */
    public function store(CreateReservationPaidServiceAPIRequest $request): JsonResponse
    {
        $reservationPaidService = ReservationPaidService::create($request->all());
        return $this->sendResponse($reservationPaidService->toArray(), 'Reservation Paid Service saved successfully');
    }

    /**
     * Display the specified ReservationPaidService.
     * GET /api/reservation_paid_services/{id}
     */
    public function show(int $id): JsonResponse
    {
        $reservationPaidService = ReservationPaidService::find($id);
        if (empty($reservationPaidService)) {
            return $this->sendError('Reservation Paid Service not found');
        }
        return $this->sendResponse($reservationPaidService->toArray(), 'Reservation Paid Service retrieved successfully');
    }

    /**
     * Update the specified ReservationPaidService.
     * PUT /api/reservation_paid_services/{id}
     */
    public function update(int $id, UpdateReservationPaidServiceAPIRequest $request): JsonResponse
    {
        $reservationPaidService = ReservationPaidService::find($id);
        if (empty($reservationPaidService)) {
            return $this->sendError('Reservation Paid Service not found');
        }
        $reservationPaidService->fill($request->all())->save();
        return $this->sendResponse($reservationPaidService->toArray(), 'Reservation Paid Service updated successfully');
    }

    /**
     * Remove the specified ReservationPaidService.
     * DELETE /api/reservation_paid_services/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $reservationPaidService = ReservationPaidService::find($id);
        if (empty($reservationPaidService)) {
            return $this->sendError('Reservation Paid Service not found');
        }
        $reservationPaidService->delete();
        return $this->sendSuccess('Reservation Paid Service deleted successfully');
    }
}