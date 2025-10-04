<?php

namespace Database\Seeders;

use App\Models\Btp;
use App\Models\Contact;
use App\Models\Inscription;
use App\Models\Travel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'utt@univers3s.com',
            'password' => bcrypt('12334567'),
            'role' => 'admin',
            'has_access' => true,
        ]);

        Contact::create([
            'nom' => 'Default Contact',
            'email' => 'contact@univers3s.com',
            'telephone' => '1234567890',
            'sujet' => 'Default Subject',
            'message' => 'Default Message',
        ]);

        Contact::create([
            'nom' => 'Default Contact',
            'email' => 'contact@univers3s.com',
            'telephone' => '1234567890',
            'sujet' => 'Default Subject',
            'message' => 'Default Message',
        ]);

        Btp::create([
            'name' => 'Default BTP',
            'email' => 'btp@univers3s.com',
            'phone' => '0987654321',
            'projectType' => 'Construction',
            'description' => 'Default BTP Project Description',
            'budget' => '50000',
            'timeline' => '6 months',
        ]);

        Btp::create([
            'name' => 'Default BTP',
            'email' => 'btp@univers3s.com',
            'phone' => '0987654321',
            'projectType' => 'Construction',
            'description' => 'Default BTP Project Description',
            'budget' => '50000',
            'timeline' => '6 months',
        ]);

        Inscription::create([
            'studentName' => 'John Doe',
            'studentAge' => 15,
            'parentName' => 'Jane Doe',
            'parentPhone' => '1122334455',
            'parentEmail' => 'parent@univers3s.com',
            'address' => '123 Main St, City',
            'level' => 'Secondary',
            'previousSchool' => 'Old School',
            'medicalInfo' => 'No allergies',
            'acceptTerms' => true,
        ]);

        Inscription::create([
            'studentName' => 'John Doe',
            'studentAge' => 15,
            'parentName' => 'Jane Doe',
            'parentPhone' => '1122334455',
            'parentEmail' => 'parent@univers3s.com',
            'address' => '123 Main St, City',
            'level' => 'Secondary',
            'previousSchool' => 'Old School',
            'medicalInfo' => 'No allergies',
            'acceptTerms' => true,
        ]);

        Travel::create([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'travel@univers3s.com',
            'phone' => '2233445566',
            'address' => '456 Travel St, City',
            'passportNumber' => 'A1234567',
            'passportExpiry' => '2030-12-31',
            'emergencyContact' => 'Jane Doe',
            'emergencyPhone' => '3344556677',
            'medicalInfo' => 'No allergies',
            'roomPreference' => 'Single',
            'specialRequests' => 'Vegetarian meals',
            'acceptTerms' => true,
        ]);
        
        Travel::create([
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => 'travel@univers3s.com',
            'phone' => '2233445566',
            'address' => '456 Travel St, City',
            'passportNumber' => 'A1234567',
            'passportExpiry' => '2030-12-31',
            'emergencyContact' => 'Jane Doe',
            'emergencyPhone' => '3344556677',
            'medicalInfo' => 'No allergies',
            'roomPreference' => 'Single',
            'specialRequests' => 'Vegetarian meals',
            'acceptTerms' => true,
        ]);
    }
}
