<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::paginate(15);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $payment->field ?? ''
        $payment = new Payment();
        return view('payments.create', compact('payment'));
    }

    public function store(CreatePaymentRequest $request)
    {
        Payment::create($request->validated());
        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.edit', compact('payment'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdatePaymentRequest $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->validated());
        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        Payment::findOrFail($id)->delete();
        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully.');
    }
}