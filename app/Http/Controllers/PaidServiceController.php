<?php

namespace App\Http\Controllers;

use App\Models\PaidService;
use App\Http\Requests\CreatePaidServiceRequest;
use App\Http\Requests\UpdatePaidServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaidServiceController extends Controller
{
    public function index(Request $request)
    {
        $paidServices = PaidService::paginate(15);
        return view('paid_services.index', compact('paidServices'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $paidService->field ?? ''
        $paidService = new PaidService();
        return view('paid_services.create', compact('paidService'));
    }

    public function store(CreatePaidServiceRequest $request)
    {
        PaidService::create($request->validated());
        return redirect()->route('paid-services.index')
            ->with('success', 'PaidService created successfully.');
    }

    public function show($id)
    {
        $paidService = PaidService::findOrFail($id);
        return view('paid_services.show', compact('paidService'));
    }

    public function edit($id)
    {
        $paidService = PaidService::findOrFail($id);
        return view('paid_services.edit', compact('paidService'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdatePaidServiceRequest $request, $id)
    {
        $paidService = PaidService::findOrFail($id);
        $paidService->update($request->validated());
        return redirect()->route('paid-services.index')
            ->with('success', 'PaidService updated successfully.');
    }

    public function destroy($id)
    {
        PaidService::findOrFail($id)->delete();
        return redirect()->route('paid-services.index')
            ->with('success', 'PaidService deleted successfully.');
    }
}