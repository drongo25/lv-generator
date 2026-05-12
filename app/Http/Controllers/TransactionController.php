<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::paginate(15);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $transaction->field ?? ''
        $transaction = new Transaction();
        return view('transactions.create', compact('transaction'));
    }

    public function store(CreateTransactionRequest $request)
    {
        Transaction::create($request->validated());
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateTransactionRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->validated());
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();
        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}