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
        Schema::create('fiche_de_paies', function (Blueprint $table) {
            $table->id();
            $table->date('date_fiche_de_paie');
            $table->string('Mois');

            $table->integer('salaire_brut')->nullable();
            $table->integer('primes');
            $table->integer('impots');
            $table->integer('securite_sociale');
            $table->integer('autre_retenus');
            $table->integer('salaire_net');
            $table->string('statut')->nullable();
            $table->unsignedBigInteger('id_employe');
            $table->foreign('id_employe')->references('id')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fiche_de_paies');
    }
};