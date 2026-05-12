@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Create Paid Service</h4></div>
            <div class="card-body">
                <form action="{{ route('paid-services.store') }}" method="POST">
                    @csrf
                    @include('paid_services._fields')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('paid-services.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection