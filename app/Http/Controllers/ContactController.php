<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Email;
use App\Notifications\ConfimationMail;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return response()->json(['message' => 'ContactController is working!', 'data' => $contacts]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'required|string|max:20',
                'sujet' => 'required|string|max:255',
                'message' => 'required|string|max:2000',
            ]);

            $contact = new Contact($validatedData);
            $contact->save();

            if (!$contact) {
                return response()->json(['message' => 'Echec lors de l\'enregistrement.'], 500);
            }

            if ($contact) {
                Notification::route('mail', $validatedData['email'])
                    ->notify(new ConfimationMail());

                Email::create([
                    'email' => $validatedData['email'],
                    'service' => 'Service Contact',
                ]);
            }

            return response()->json([
                'message' => 'Notre équipe vous contactera dans les plus brefs délais.',
                'data' => $contact
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Contact store error: ' . $e->getMessage());
            return response()->json(['message' => 'Une erreur inattendue est survenue.'], 500);
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
