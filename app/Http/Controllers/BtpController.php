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
        try {
            $btps = Btp::all();
            if ($btps->isEmpty()) {
                return response()->json(['message' => 'No Btp data found'], 404);
            }
            return response()->json(['data' => $btps]);
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la récupération des données Btp: ' . $e->getMessage());
            return response()->json([
                'message' => 'Erreur lors de la récupération des données Btp.',
                'error' => 'Une erreur interne est survenue.'
            ], 500);
        }
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
                    'service' => 'Contact',
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
        $btp = Btp::find($id);
        if (!$btp) {
            return response()->json(['message' => 'Btp not found'], 404);
        }
        return response()->json(['data' => $btp]);
    }

    public function update(Request $request, $id)
    {
        $btp = Btp::find($id);
        if (!$btp) {
            return response()->json(['message' => 'Btp not found'], 404);
        }

        // Update the Btp model with validated data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'projectType' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'budget' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
        ]);

        $btp->fill($validatedData);
        $btp->save();

        return response()->json(['message' => "Btp data for ID: $id updated successfully"]);
    }

    public function destroy($id)
    {
        $btp = Btp::find($id);
        if (!$btp) {
            return response()->json(['message' => 'Btp not found'], 404);
        }

        $btp->delete();
        return response()->json(['message' => "Btp data for ID: $id deleted successfully"]);
    }
}
