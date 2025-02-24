<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('nom');                  // Nom du médicament ou de l'équipement
            $table->string('type');                 // 'médicament' ou 'équipement'
            $table->integer('quantite')->default(0); // Quantité en stock
            $table->integer('seuil_min')->default(10); // Seuil pour alerte stock faible
            $table->foreignId('fournisseur_id')->nullable()->constrained('fournisseurs')->onDelete('set null'); // Lien vers fournisseur
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}