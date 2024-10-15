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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut_contrat');
            $table->date('date_fin_contrat');
            $table->string('type_contrat');
            $table->integer('salaire');
            $table->string('contrat_pdf')->nullable();
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
        //
    }
};
