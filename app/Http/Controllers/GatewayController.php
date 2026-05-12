<?php

namespace App\Http\Controllers;

use App\Models\Gateway;
use App\Http\Requests\CreateGatewayRequest;
use App\Http\Requests\UpdateGatewayRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GatewayController extends Controller
{
    public function index(Request $request)
    {
        $gateways = Gateway::paginate(15);
        return view('gateways.index', compact('gateways'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $gateway->field ?? ''
        $gateway = new Gateway();
        return view('gateways.create', compact('gateway'));
    }

    public function store(CreateGatewayRequest $request)
    {
        Gateway::create($request->validated());
        return redirect()->route('gateways.index')
            ->with('success', 'Gateway created successfully.');
    }

    public function show($id)
    {
        $gateway = Gateway::findOrFail($id);
        return view('gateways.show', compact('gateway'));
    }

    public function edit($id)
    {
        $gateway = Gateway::findOrFail($id);
        return view('gateways.edit', compact('gateway'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateGatewayRequest $request, $id)
    {
        $gateway = Gateway::findOrFail($id);
        $gateway->update($request->validated());
        return redirect()->route('gateways.index')
            ->with('success', 'Gateway updated successfully.');
    }

    public function destroy($id)
    {
        Gateway::findOrFail($id)->delete();
        return redirect()->route('gateways.index')
            ->with('success', 'Gateway deleted successfully.');
    }
}