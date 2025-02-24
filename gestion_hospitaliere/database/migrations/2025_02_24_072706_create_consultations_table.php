<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Exécutez les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade'); // Liaison avec la table patients
            $table->date('date'); // Champ pour la date de la consultation
            $table->string('raison'); // Champ pour la raison de la consultation
            $table->string('ordonnances')->nullable(); // Champ pour les ordonnances, optionnel
            $table->string('prescriptions')->nullable(); // Champ pour les prescriptions, optionnel
            $table->timestamps();
        });
    }

    /**
     * Annulez la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
