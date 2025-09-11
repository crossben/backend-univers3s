<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Notifications\ConfimationMail;
use Illuminate\Support\Facades\Notification;

class TravelController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'TravelController is working!']);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'firstName' => 'nullable|string|max:255',
                'lastName' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'passportNumber' => 'nullable|string|max:255',
                'passportExpiry' => 'nullable|date',
                'emergencyContact' => 'nullable|string|max:255',
                'emergencyPhone' => 'nullable|string|max:255',
                'medicalInfo' => 'nullable|string',
                'roomPreference' => 'nullable|string|max:255',
                'specialRequests' => 'nullable|string',
                'acceptTerms' => 'required|boolean|accepted',
            ]);

            // Ensure boolean is cast correctly
            $validatedData['acceptTerms'] = (bool) ($validatedData['acceptTerms'] ?? false);

            $travel = Travel::create($validatedData);
            $travel->save();

            if ($travel) {
                Notification::route('mail', $validatedData['email'])
                    ->notify(new ConfimationMail());

                Email::create([
                    'email' => $validatedData['email'],
                    'service' => 'Service Contact',
                ]);
            }

            return response()->json([
                'message' => 'Travel data submitted successfully',
                'data' => $travel
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while submitting travel data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        // Logic to retrieve specific travel data by ID
        return response()->json(['message' => "Travel data for ID: $id"]);
    }

    public function update(Request $request, $id)
    {
        // Logic to update specific travel data by ID
        return response()->json(['message' => "Travel data for ID: $id updated successfully"]);
    }

    public function destroy($id)
    {
        // Logic to delete specific travel data by ID
        return response()->json(['message' => "Travel data for ID: $id deleted successfully"]);
    }
}
