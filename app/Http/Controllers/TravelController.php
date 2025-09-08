<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use App\Models\Travel;
use App\Mail\Confirmation;
use Illuminate\Support\Facades\Mail;

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
                'destination' => 'required|string|max:255',
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
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
                'travelerName' => 'required|string|max:255',
                'travelerEmail' => 'required|email|max:255',
                'notes' => 'nullable|string|max:1000',
            ]);

            // Ensure boolean is cast correctly
            $validatedData['acceptTerms'] = (bool) ($validatedData['acceptTerms'] ?? false);

            $travel = Travel::create($validatedData)->save();

            if ($travel) {
                Mail::to($validatedData['travelerEmail'])->send(new Confirmation([
                    'email' => $validatedData['travelerEmail'],
                    'service' => 'Service Voyage',
                ]));

                Email::create([
                    'email' => $validatedData['travelerEmail'],
                    'service' => 'Service Voyage',
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
