<?php

namespace App\Http\Controllers;

use App\Models\TaxManager;
use App\Http\Requests\CreateTaxManagerRequest;
use App\Http\Requests\UpdateTaxManagerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxManagerController extends Controller
{
    public function index(Request $request)
    {
        $taxManagers = TaxManager::paginate(15);
        return view('tax_managers.index', compact('taxManagers'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $taxManager->field ?? ''
        $taxManager = new TaxManager();
        return view('tax_managers.create', compact('taxManager'));
    }

    public function store(CreateTaxManagerRequest $request)
    {
        TaxManager::create($request->validated());
        return redirect()->route('tax-managers.index')
            ->with('success', 'TaxManager created successfully.');
    }

    public function show($id)
    {
        $taxManager = TaxManager::findOrFail($id);
        return view('tax_managers.show', compact('taxManager'));
    }

    public function edit($id)
    {
        $taxManager = TaxManager::findOrFail($id);
        return view('tax_managers.edit', compact('taxManager'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateTaxManagerRequest $request, $id)
    {
        $taxManager = TaxManager::findOrFail($id);
        $taxManager->update($request->validated());
        return redirect()->route('tax-managers.index')
            ->with('success', 'TaxManager updated successfully.');
    }

    public function destroy($id)
    {
        TaxManager::findOrFail($id)->delete();
        return redirect()->route('tax-managers.index')
            ->with('success', 'TaxManager deleted successfully.');
    }
}