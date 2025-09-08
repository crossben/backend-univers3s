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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('studentName');
            $table->integer('studentAge')->nullable();
            $table->string('parentName');
            $table->string('parentPhone');
            $table->string('parentEmail');
            $table->string('address');
            $table->string('level');
            $table->string('previousSchool')->nullable();
            $table->text('medicalInfo')->nullable();
            $table->boolean('acceptTerms')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
