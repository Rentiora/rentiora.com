<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;

class RentalController extends Controller
{
    /**
     * Store a newly created rental in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id', // Ensure the column name matches the actual column in the cars table
            'user_id' => 'required|exists:users,id',
            'rental_date' => 'required|date',
            'return_date' => 'required|date|after:rental_date',
        ]);

        $rental = Rental::create([
            'car_id' => $request->car_id,
            'user_id' => $request->user_id,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date,
        ]);

        return response()->json($rental, 201);
    }

    /**
     * Display the specified rental.
     */
    public function show($id)
    {
        $rental = Rental::findOrFail($id);
        return response()->json($rental);
    }

    /**
     * Update the specified rental in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'sometimes|required|exists:cars,id', // Ensure the column name matches the actual column in the cars table
            'user_id' => 'sometimes|required|exists:users,id',
            'rental_date' => 'sometimes|required|date',
            'return_date' => 'sometimes|required|date|after:rental_date',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update($request->all());

        return response()->json($rental);
    }

    /**
     * Remove the specified rental from storage.
     */
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return response()->json(null, 204);
    }
}