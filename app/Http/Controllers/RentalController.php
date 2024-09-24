<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Rental::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'car_id' => 'required|exists:cars,car_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:booked,completed,canceled',
        ]);

        return Rental::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        return $rental;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'car_id' => 'required|exists:cars,car_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:booked,completed,canceled',
        ]);

        $rental->update($request->all());

        return $rental;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();

        return response()->noContent();
    }
}
