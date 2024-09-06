@extends('layouts.layout')

@section('title', 'Edit Vehicle')

@section('content')

<h1 class="my-4">Edit Vehicle</h1>

<!-- Edit Vehicle Form -->
<div class="card">
    <div class="card-header">
        <h4>Update Vehicle Details</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('vehicle.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="make" class="form-label">Make</label>
                <input type="text" class="form-control" id="make" name="make" value="{{ $vehicle->make }}" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $vehicle->model }}" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $vehicle->year }}" required min="1900">
            </div>
            <div class="mb-3">
                <label for="license_plate" class="form-label">License Plate</label>
                <input type="text" class="form-control" id="license_plate" name="license_plate" value="{{ $vehicle->license_plate }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Vehicle</button>
        </form>
    </div>
</div>

@endsection
