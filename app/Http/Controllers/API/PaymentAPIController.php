<?php

namespace App\Http\Controllers\API;

use App\Models\Payment;
use App\Http\Requests\API\CreatePaymentAPIRequest;
use App\Http\Requests\API\UpdatePaymentAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentAPIController extends AppBaseController
{
    /**
     * Display a listing of the Payment.
     * GET /api/payments
     */
    public function index(Request $request): JsonResponse
    {
        $query = Payment::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Payments retrieved successfully');
    }

    /**
     * Store a newly created Payment.
     * POST /api/payments
     */
    public function store(CreatePaymentAPIRequest $request): JsonResponse
    {
        $payment = Payment::create($request->all());
        return $this->sendResponse($payment->toArray(), 'Payment saved successfully');
    }

    /**
     * Display the specified Payment.
     * GET /api/payments/{id}
     */
    public function show(int $id): JsonResponse
    {
        $payment = Payment::find($id);
        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }
        return $this->sendResponse($payment->toArray(), 'Payment retrieved successfully');
    }

    /**
     * Update the specified Payment.
     * PUT /api/payments/{id}
     */
    public function update(int $id, UpdatePaymentAPIRequest $request): JsonResponse
    {
        $payment = Payment::find($id);
        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }
        $payment->fill($request->all())->save();
        return $this->sendResponse($payment->toArray(), 'Payment updated successfully');
    }

    /**
     * Remove the specified Payment.
     * DELETE /api/payments/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $payment = Payment::find($id);
        if (empty($payment)) {
            return $this->sendError('Payment not found');
        }
        $payment->delete();
        return $this->sendSuccess('Payment deleted successfully');
    }
}