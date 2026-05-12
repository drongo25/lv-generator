<?php

namespace App\Http\Controllers;

use App\Models\SpecialPrice;
use App\Http\Requests\CreateSpecialPriceRequest;
use App\Http\Requests\UpdateSpecialPriceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpecialPriceController extends Controller
{
    public function index(Request $request)
    {
        $specialPrices = SpecialPrice::paginate(15);
        return view('special_prices.index', compact('specialPrices'));
    }

    public function create()
    {
        return view('special_prices.create');
    }

    public function store(CreateSpecialPriceRequest $request)
    {
        SpecialPrice::create($request->validated());
        return redirect()->route('special-prices.index')
            ->with('success', 'SpecialPrice created successfully.');
    }

    public function show($id)
    {
        $specialPrice = SpecialPrice::findOrFail($id);
        return view('special_prices.show', compact('specialPrice'));
    }

    public function edit($id)
    {
        $specialPrice = SpecialPrice::findOrFail($id);
        return view('special_prices.edit', compact('specialPrice'));
    }

    public function update($id, UpdateSpecialPriceRequest $request)
    {
        $specialPrice = SpecialPrice::findOrFail($id);
        $specialPrice->update($request->validated());
        return redirect()->route('special-prices.index')
            ->with('success', 'SpecialPrice updated successfully.');
    }

    public function destroy($id)
    {
        SpecialPrice::findOrFail($id)->delete();
        return redirect()->route('special-prices.index')
            ->with('success', 'SpecialPrice deleted successfully.');
    }
}