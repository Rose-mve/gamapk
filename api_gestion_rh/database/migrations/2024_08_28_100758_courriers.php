<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->date('date_du_courrier')->nullable();
            $table->string('type_de_courrier')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('motif')->nullable();
            $table->string('fichier_justificatif')->nullable();
            $table->string('type_de_sanction')->nullable();
            $table->string('mesure_corrective')->nullable();
            $table->string('statut')->nullable();
            $table->unsignedBigInteger('id_employe')->nullable();
            $table->foreign('id_employe')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
};
