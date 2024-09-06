<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    

    /**
     * Store a new vehicle.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer|min:1900',
        'license_plate' => 'required|string|unique:vehicles',
    ]);

    Vehicle::create($validatedData);

    return redirect()->route('vehicle.index')->with('success', 'Vehicle added successfully!');
}

    /**
     * Show a specific vehicle by id.
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        return $vehicle;
    }

  
    
  
   


    /**
     * List all vehicles.
     */
    public function index()
{
    $vehicles = Vehicle::all();
    return view('vehicles', ['vehicles' => $vehicles]);
}

  /**
    * Edit a vehicle by id.
      */

public function edit($id)
{
    $vehicle = Vehicle::find($id);

    if (!$vehicle) {
        return redirect()->route('vehicle.index')->with('error', 'Vehicle not found');
    }

    return view('edit-vehicle', compact('vehicle'));
}

  /**
     * Update an existing vehicle.
     */
public function update(Request $request, $id)
{
    $vehicle = Vehicle::find($id);

    if (!$vehicle) {
        return redirect()->route('vehicle.index')->with('error', 'Vehicle not found');
    }

    $validatedData = $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer|min:1900',
        'license_plate' => 'required|string|unique:vehicles,license_plate,' . $id,
    ]);

    $vehicle->update($validatedData);

    return redirect()->route('vehicle.index')->with('success', 'Vehicle updated successfully!');
}


  /**
    * Delete a vehicle by id.
      */

public function destroy($id)
{
    $vehicle = Vehicle::find($id);

    if (!$vehicle) {
        return redirect()->route('vehicle.index')->with('error', 'Vehicle not found');
    }

    $vehicle->delete();

    return redirect()->route('vehicle.index')->with('success', 'Vehicle deleted successfully!');
}


}
