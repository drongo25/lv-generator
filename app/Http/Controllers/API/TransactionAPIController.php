<?php

namespace App\Http\Controllers\API;

use App\Models\Transaction;
use App\Http\Requests\API\CreateTransactionAPIRequest;
use App\Http\Requests\API\UpdateTransactionAPIRequest;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Transaction.
     * GET /api/transactions
     */
    public function index(Request $request): JsonResponse
    {
        $query = Transaction::query();

        if ($skip = $request->get('skip'))  $query->skip((int) $skip);
        if ($limit = $request->get('limit')) $query->limit((int) $limit);

        return $this->sendResponse($query->get()->toArray(), 'Transactions retrieved successfully');
    }

    /**
     * Store a newly created Transaction.
     * POST /api/transactions
     */
    public function store(CreateTransactionAPIRequest $request): JsonResponse
    {
        $transaction = Transaction::create($request->all());
        return $this->sendResponse($transaction->toArray(), 'Transaction saved successfully');
    }

    /**
     * Display the specified Transaction.
     * GET /api/transactions/{id}
     */
    public function show(int $id): JsonResponse
    {
        $transaction = Transaction::find($id);
        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }
        return $this->sendResponse($transaction->toArray(), 'Transaction retrieved successfully');
    }

    /**
     * Update the specified Transaction.
     * PUT /api/transactions/{id}
     */
    public function update(int $id, UpdateTransactionAPIRequest $request): JsonResponse
    {
        $transaction = Transaction::find($id);
        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }
        $transaction->fill($request->all())->save();
        return $this->sendResponse($transaction->toArray(), 'Transaction updated successfully');
    }

    /**
     * Remove the specified Transaction.
     * DELETE /api/transactions/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $transaction = Transaction::find($id);
        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }
        $transaction->delete();
        return $this->sendSuccess('Transaction deleted successfully');
    }
}