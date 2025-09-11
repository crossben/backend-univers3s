<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use App\Models\Btp;
use App\Notifications\ConfimationMail;
use Illuminate\Support\Facades\Notification;

class BtpController extends Controller
{
    public function index()
    {
        $btps = Btp::all();
        return response()->json(['data' => $btps]);
    }

    public function store(Request $request)
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'name' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:50',
                'projectType' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'budget' => 'nullable|string|max:255',
                'timeline' => 'nullable|string|max:255',
            ]);

            // Additional manual validation (if needed)
            // if (strtotime($validatedData['startDate']) > strtotime($validatedData['endDate'])) {
            //     return response()->json(['message' => 'La date de début doit être antérieure ou égale à la date de fin.'], 422);
            // }

            // Create and save the Btp model
            $btp = new Btp($validatedData);
            $btp->save();

            if ($btp) {
                Notification::route('mail', $validatedData['email'])
                    ->notify(new ConfimationMail());

                Email::create([
                    'email' => $validatedData['email'],
                    'service' => 'Service Contact',
                ]);
            }

            return response()->json([
                'message' => 'Les données du projet ont été soumises avec succès.',
                'data' => $btp
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Erreur lors de la soumission des données du projet: ' . $e->getMessage());
            return response()->json([
                'message' => 'Erreur lors de la soumission des données du projet.',
                'error' => 'Une erreur interne est survenue.'
            ], 500);
        }
    }

    public function show($id)
    {
        // Logic to retrieve specific contact data by ID
        return response()->json(['message' => "Contact data for ID: $id"]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update specific contact data by ID
        return response()->json(['message' => "Contact data for ID: $id updated successfully"]);
    }

    public function destroy($id)
    {
        // Logic to delete specific contact data by ID
        return response()->json(['message' => "Contact data for ID: $id deleted successfully"]);
    }
}
