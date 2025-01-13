<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    // Retrieve all vehicles
    public function index()
    {
        $vehicules = Vehicule::all(); // Fetch all vehicles
        return response()->json($vehicules, 200); // Return as JSON
    }

    // Retrieve a single vehicle by ID
    public function show($id)
    {
        $vehicule = Vehicule::find($id);

        if (!$vehicule) {
            return response()->json(['error' => 'Vehicule not found'], 404);
        }

        return response()->json($vehicule, 200);
    }

    // Create a new vehicle
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Matricule' => 'required|string|max:50|unique:vehicules,Matricule',
        'Marque' => 'required|string|max:255',
        'Model' => 'required|string|max:255',
        'Annee' => 'required|integer|min:1900|max:' . date('Y'),
        'Type' => 'required|string|max:100',
        'PrixJour' => 'required|numeric|min:0',
        'IdAgence' => 'required|exists:agences,IdAgence',
        'StatuVehicule' => 'required|in:M,R,D', // Restrict to 'M', 'R', or 'D'
    ]);

    $vehicule = Vehicule::create($validatedData);
    return response()->json([
        'message' => 'Vehicule created successfully',
        'vehicule' => $vehicule,
    ]);
}

public function update(Request $request, $id)
{
    $vehicule = Vehicule::find($id);

    if (!$vehicule) {
        return response()->json(['error' => 'Vehicule not found'], 404);
    }

    $validatedData = $request->validate([
        'Matricule' => 'sometimes|required|string|max:50|unique:vehicules,Matricule,' . $id . ',IdVehicule',
        'Marque' => 'sometimes|required|string|max:255',
        'Model' => 'sometimes|required|string|max:255',
        'Annee' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
        'Type' => 'sometimes|required|string|max:100',
        'PrixJour' => 'sometimes|required|numeric|min:0',
        'IdAgence' => 'sometimes|required|exists:agences,IdAgence',
        'StatuVehicule' => 'sometimes|required|in:M,R,D', // Restrict to 'M', 'R', or 'D'
    ]);

    $vehicule->update($validatedData);
    return response()->json($vehicule, 200);
}

    // Delete a vehicle
    public function destroy($id)
    {
        $vehicule = Vehicule::find($id);

        if (!$vehicule) {
            return response()->json(['error' => 'Vehicule not found'], 404);
        }

        $vehicule->delete();
        return response()->json(['message' => 'Vehicule deleted successfully'], 200);
    }
}
