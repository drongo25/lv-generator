@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4 class="mb-0">Edit Web Facility</h4></div>
            <div class="card-body">
                <form action="{{ route('web-facilities.update', $webFacility->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('web_facilities._fields')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('web-facilities.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection