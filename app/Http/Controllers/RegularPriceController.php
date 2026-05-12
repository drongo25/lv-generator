<?php

namespace App\Http\Controllers;

use App\Models\RegularPrice;
use App\Http\Requests\CreateRegularPriceRequest;
use App\Http\Requests\UpdateRegularPriceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegularPriceController extends Controller
{
    public function index(Request $request)
    {
        $regularPrices = RegularPrice::paginate(15);
        return view('regular_prices.index', compact('regularPrices'));
    }

    public function create()
    {
        return view('regular_prices.create');
    }

    public function store(CreateRegularPriceRequest $request)
    {
        RegularPrice::create($request->validated());
        return redirect()->route('regular-prices.index')
            ->with('success', 'RegularPrice created successfully.');
    }

    public function show($id)
    {
        $regularPrice = RegularPrice::findOrFail($id);
        return view('regular_prices.show', compact('regularPrice'));
    }

    public function edit($id)
    {
        $regularPrice = RegularPrice::findOrFail($id);
        return view('regular_prices.edit', compact('regularPrice'));
    }

    public function update($id, UpdateRegularPriceRequest $request)
    {
        $regularPrice = RegularPrice::findOrFail($id);
        $regularPrice->update($request->validated());
        return redirect()->route('regular-prices.index')
            ->with('success', 'RegularPrice updated successfully.');
    }

    public function destroy($id)
    {
        RegularPrice::findOrFail($id)->delete();
        return redirect()->route('regular-prices.index')
            ->with('success', 'RegularPrice deleted successfully.');
    }
}