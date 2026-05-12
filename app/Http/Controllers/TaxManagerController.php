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
        return view('tax_managers.create');
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

    public function update($id, UpdateTaxManagerRequest $request)
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