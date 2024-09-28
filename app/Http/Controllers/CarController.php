<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // List all cars
    public function index()
    {
        return response()->json(Car::all(), 200);
    }

    // Store a new car
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'availability_status' => 'required|in:Available,Booked,Maintenance',
        ]);

        $car = Car::create($validatedData);
        return response()->json($car, 201);
    }

    // Show single car
    public function show(Car $car)
    {
        return response()->json($car, 200);
    }

    // Update car details
    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price_per_day' => 'required|numeric',
            'availability_status' => 'required|in:Available,Booked,Maintenance',
        ]);

        $car->update($validatedData);
        return response()->json($car, 200);
    }

    // Delete a car
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }
}