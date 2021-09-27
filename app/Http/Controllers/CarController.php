<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create() 
    {
        $cars = Car::all();
        return view('cars.create', compact('cars'));
    }
    
    public function store(Request $request)
    {
        Car::create($request->all());
        return redirect()->route('cars.create')->with('message', 'Samochód został dodany!');;
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.create');
    }
}
