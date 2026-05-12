@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Special Prices</h1>
    <a href="{{ route('special-prices.create') }}" class="btn btn-primary">+ Add New</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                <th>Room Type Id</th>
                <th>Title</th>
                <th>Start Time</th>
                <th>End Time</th>
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
                <th>Status</th>
                        <th width="160">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($specialPrices as $specialPrice)
                    <tr>
                <td>{{ $specialPrice->room_type_id }}</td>
                <td>{{ $specialPrice->title }}</td>
                <td>{{ $specialPrice->start_time }}</td>
                <td>{{ $specialPrice->end_time }}</td>
                <td>{{ $specialPrice->day_1 }}</td>
                <td>{{ $specialPrice->day_1_amount }}</td>
                <td>{{ $specialPrice->day_2 }}</td>
                <td>{{ $specialPrice->day_2_amount }}</td>
                <td>{{ $specialPrice->day_3 }}</td>
                <td>{{ $specialPrice->day_3_amount }}</td>
                <td>{{ $specialPrice->day_4 }}</td>
                <td>{{ $specialPrice->day_4_amount }}</td>
                <td>{{ $specialPrice->day_5 }}</td>
                <td>{{ $specialPrice->day_5_amount }}</td>
                <td>{{ $specialPrice->day_6 }}</td>
                <td>{{ $specialPrice->day_6_amount }}</td>
                <td>{{ $specialPrice->day_7 }}</td>
                <td>{{ $specialPrice->day_7_amount }}</td>
                <td>{{ $specialPrice->status }}</td>
                        <td>
                            <a href="{{ route('special-prices.show', $specialPrice->id) }}"
                               class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('special-prices.edit', $specialPrice->id) }}"
                               class="btn btn-sm btn-outline-warning">Edit</a>
                            <form action="{{ route('special-prices.destroy', $specialPrice->id) }}"
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

<div class="mt-3">{{ $specialPrices->links() }}</div>
@endsection