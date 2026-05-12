@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Regular Prices</h1>
    <a href="{{ route('regular-prices.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Room Type Id</th>
                <th>Day 1</th>
                <th>Day 1 Amount</th>
                <th>Day 2</th>
                <th>Day 2 Amount</th>
                <th>Day 3</th>
                <th>Day 3 Amount</th>
                <th>Day 4</th>
                <th>Day 4 Amount</th>
                <th>Day 5</th>
                <th>Day 5 Amount</th>
                <th>Day 6</th>
                <th>Day 6 Amount</th>
                <th>Day 7</th>
                <th>Day 7 Amount</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($regularPrices as $regularPrice)
                    <tr>
                <td>{{ $regularPrice->room_type_id }}</td>
                <td>{{ $regularPrice->day_1 }}</td>
                <td>{{ $regularPrice->day_1_amount }}</td>
                <td>{{ $regularPrice->day_2 }}</td>
                <td>{{ $regularPrice->day_2_amount }}</td>
                <td>{{ $regularPrice->day_3 }}</td>
                <td>{{ $regularPrice->day_3_amount }}</td>
                <td>{{ $regularPrice->day_4 }}</td>
                <td>{{ $regularPrice->day_4_amount }}</td>
                <td>{{ $regularPrice->day_5 }}</td>
                <td>{{ $regularPrice->day_5_amount }}</td>
                <td>{{ $regularPrice->day_6 }}</td>
                <td>{{ $regularPrice->day_6_amount }}</td>
                <td>{{ $regularPrice->day_7 }}</td>
                <td>{{ $regularPrice->day_7_amount }}</td>
                        <td>
                            <a href="{{ route('regular-prices.show', $regularPrice->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('regular-prices.edit', $regularPrice->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('regular-prices.destroy', $regularPrice->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="99" class="text-center text-muted py-4">No records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3">{{ $regularPrices->links() }}</div>
@endsection