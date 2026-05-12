<?php

namespace App\Http\Controllers\API;

use App\Models\ReservationTax;
use App\Http\Requests\API\CreateReservationTaxAPIRequest;
use App\Http\Requests\API\UpdateReservationTaxAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationTaxAPIController extends AppBaseController
{
    /**
     * Display a listing of the ReservationTax.
     * GET /api/reservation_taxes
     */
    public function index(Request $request): JsonResponse
    {
        $query = ReservationTax::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Reservation Taxes retrieved successfully');
    }

    /**
     * Store a newly created ReservationTax.
     * POST /api/reservation_taxes
     */
    public function store(CreateReservationTaxAPIRequest $request): JsonResponse
    {
        $reservationTax = ReservationTax::create($request->all());
        return $this->sendResponse($reservationTax->toArray(), 'Reservation Tax saved successfully');
    }

    /**
     * Display the specified ReservationTax.
     * GET /api/reservation_taxes/{id}
     */
    public function show(int $id): JsonResponse
    {
        $reservationTax = ReservationTax::find($id);
        if (empty($reservationTax)) {
            return $this->sendError('Reservation Tax not found');
        }
        return $this->sendResponse($reservationTax->toArray(), 'Reservation Tax retrieved successfully');
    }

    /**
     * Update the specified ReservationTax.
     * PUT /api/reservation_taxes/{id}
     */
    public function update(int $id, UpdateReservationTaxAPIRequest $request): JsonResponse
    {
        $reservationTax = ReservationTax::find($id);
        if (empty($reservationTax)) {
            return $this->sendError('Reservation Tax not found');
        }
        $reservationTax->fill($request->all())->save();
        return $this->sendResponse($reservationTax->toArray(), 'Reservation Tax updated successfully');
    }

    /**
     * Remove the specified ReservationTax.
     * DELETE /api/reservation_taxes/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $reservationTax = ReservationTax::find($id);
        if (empty($reservationTax)) {
            return $this->sendError('Reservation Tax not found');
        }
        $reservationTax->delete();
        return $this->sendSuccess('Reservation Tax deleted successfully');
    }
}