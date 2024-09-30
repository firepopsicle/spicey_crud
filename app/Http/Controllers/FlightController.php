<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function create()
    {
        return view('flights.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'flight_number' => 'required',
            'destination' => 'required',
            'departure_time' => 'required|date',
        ]);

        Flight::create($request->all());
        return redirect()->route('flights.index');
    }
    public function edit(Flight $flight)
    {
        // Ensure departure_time is a Carbon instance
        $flight->departure_time = \Carbon\Carbon::parse($flight->departure_time);
        return view('flights.edit', compact('flight'));
    }
    
    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'flight_number' => 'required',
            'destination' => 'required',
            'departure_time' => 'required|date',
        ]);

        $flight->update($request->all());
        return redirect()->route('flights.index');
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('flights.index');
    }
}
