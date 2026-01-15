<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return $cars;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Cylinders' => 'nullable|numeric',
            'Miles_per_Gallon' => 'nullable|numeric',
            'Displacement' => 'nullable|numeric',
            'Horsepower' => 'nullable|numeric',
            'Weight_in_lbs' => 'nullable|numeric',
            'Acceleration' => 'nullable|numeric',
            'Year' => 'nullable|date',
            'Origin' => 'nullable|string'
        ]);

        $car = Car::create($validated);

        return response()->json($car, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'Name' => 'sometimes|required|string|max:255',
            'Cylinders' => 'nullable|numeric',
            'Miles_per_Gallon' => 'nullable|numeric',
            'Displacement' => 'nullable|numeric',
            'Horsepower' => 'nullable|numeric',
            'Weight_in_lbs' => 'nullable|numeric',
            'Acceleration' => 'nullable|numeric',
            'Year' => 'nullable|date',
            'Origin' => 'nullable|string'
        ]);

        $car->update($validated);

        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        
        if ($car->delete()) {
            return response()->noContent();
        }

        return response()->json(['message' => 'Something went wrong.'], 400);
    }

    public function findByName($name) {
        $cars = Car::where('Name', 'like', '%'.$name.'%')->get();
        if ($cars->isNotEmpty())
        {
            return $cars;
        }
        return response()->json(['Message' => 'No car found.'], 404);
    }
}
