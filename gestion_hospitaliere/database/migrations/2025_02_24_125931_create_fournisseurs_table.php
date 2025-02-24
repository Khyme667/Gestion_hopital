<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');            // Nom du fournisseur
            $table->string('contact')->nullable(); // Contact (téléphone, email, etc.)
            $table->string('adresse')->nullable(); // Adresse du fournisseur
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fournisseurs');
    }
}