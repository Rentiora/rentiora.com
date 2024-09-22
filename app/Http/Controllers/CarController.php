<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return Car::all();
    }

    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    public function show($id)
    {
        return Car::find($id);
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return response()->json($car, 200);
    }

    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
