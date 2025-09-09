<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Confirmation;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use App\Models\Inscription;

class InscriptionController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Inscription endpoint']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'studentName' => 'required|string|max:255',
            'studentAge' => 'required|integer|min:1',
            'parentName' => 'required|string|max:255',
            'parentPhone' => 'required|string|max:20',
            'parentEmail' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'level' => 'required|string|max:100',
            'previousSchool' => 'nullable|string|max:255',
            'medicalInfo' => 'nullable|string|max:1000',
            'acceptTerms' => 'required|boolean|in:1,true',
        ]);

        $inscription = Inscription::create($validatedData);
        $inscription->save();

        if ($inscription) {
            Mail::to($validatedData['parentEmail'])->send(new Confirmation([
                'email' => $validatedData['parentEmail'],
                'service' => 'Service Inscription',
            ]));

            Email::create([
                'email' => $validatedData['parentEmail'],
                'service' => 'Service Inscription',
            ]);
        }

        return response()->json([
            'message' => 'Inscription submitted successfully',
            'data' => $inscription
        ], 201);
    }

    public function show($id)
    {
        $inscription = Inscription::find($id);

        if (!$inscription) {
            return response()->json(['message' => 'Inscription not found'], 404);
        }

        return response()->json($inscription);
    }

    public function update(Request $request, $id)
    {
        $inscription = Inscription::find($id);

        if (!$inscription) {
            return response()->json(['message' => 'Inscription not found'], 404);
        }

        $validatedData = $request->validate([
            'studentName' => 'sometimes|required|string|max:255',
            'studentAge' => 'sometimes|required|integer|min:1',
            'parentName' => 'sometimes|required|string|max:255',
            'parentPhone' => 'sometimes|required|string|max:20',
            'parentEmail' => 'sometimes|required|email|max:255',
            'address' => 'sometimes|required|string|max:500',
            'level' => 'sometimes|required|string|max:100',
            'previousSchool' => 'nullable|string|max:255',
            'medicalInfo' => 'nullable|string|max:1000',
            'acceptTerms' => 'sometimes|required|boolean|in:1,true',
        ]);

        $inscription->update($validatedData);

        return response()->json([
            'message' => 'Inscription updated successfully',
            'data' => $inscription
        ]);
    }

    public function destroy($id)
    {
        $inscription = Inscription::find($id);

        if (!$inscription) {
            return response()->json(['message' => 'Inscription not found'], 404);
        }

        $inscription->delete();

        return response()->json(['message' => 'Inscription deleted successfully']);
    }
}
