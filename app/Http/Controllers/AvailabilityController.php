<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of all cars with their availability status.
     */
    public function index()
    {
        $cars = Car::all(['id', 'make', 'model', 'availability_status']);
        return response()->json($cars, 200);
    }

    /**
     * Display the availability status of a specific car.
     */
    public function show(Car $car)
    {
        return response()->json(['availability_status' => $car->availability_status], 200);
    }

    /**
     * Update the availability status of a specific car.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'availability_status' => 'required|in:Available,Booked,Maintenance',
        ]);

        $car->availability_status = $request->availability_status;
        $car->save();

        return response()->json(['message' => 'Availability status updated successfully', 'car' => $car], 200);
    }
}