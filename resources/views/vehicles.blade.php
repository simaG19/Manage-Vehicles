@extends('layouts.layout')

@section('title', 'Vehicle Manager')

@section('content')

<h1 class="my-4">Manage Vehicles</h1>

<!-- Add Vehicle Form -->
<div class="card mb-4">
    <div class="card-header">
        <h4>Add New Vehicle</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('vehicle.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="make" class="form-label">Make</label>
                <input type="text" class="form-control" id="make" name="make" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" required min="1900">
            </div>
            <div class="mb-3">
                <label for="license_plate" class="form-label">License Plate</label>
                <input type="text" class="form-control" id="license_plate" name="license_plate" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
        </form>
    </div>
</div>

<!-- Vehicle List -->
<div class="card">
    <div class="card-header">
        <h4>Vehicle List</h4>
    </div>
    <div class="card-body">
        @if ($vehicles->isEmpty())
            <p>No vehicles found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>License Plate</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $vehicle)
                        <tr>
                            <td>{{ $vehicle->id }}</td>
                            <td>{{ $vehicle->make }}</td>
                            <td>{{ $vehicle->model }}</td>
                            <td>{{ $vehicle->year }}</td>
                            <td>{{ $vehicle->license_plate }}</td>
                            <td>
                                <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection
