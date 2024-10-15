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
        // Migration pour la table des employés
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
             $table->string('prenom');
            $table->string('genre');
            $table->string('profession');
            $table->string('matricule')->nullable();
             $table->string('tel');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('statut')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
