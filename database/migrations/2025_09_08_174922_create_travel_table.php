<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travel', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('passportNumber')->nullable();
            $table->date('passportExpiry')->nullable();
            $table->string('emergencyContact')->nullable();
            $table->string('emergencyPhone')->nullable();
            $table->text('medicalInfo')->nullable();
            $table->string('roomPreference')->nullable();
            $table->text('specialRequests')->nullable();
            $table->boolean('acceptTerms')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
