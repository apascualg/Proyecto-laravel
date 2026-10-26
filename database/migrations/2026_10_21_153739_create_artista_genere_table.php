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
        Schema::create('artista_genere', function (Blueprint $table) {
            $table->foreignId('genere_id')->constrained('generes'); //ns si asi o en singular//Feu la primera FK
            $table->foreignId('artista_id')->constrained('artistas');//ns si asi o en singular  //Feu la segona FK
            $table->primary(['genere_id', 'artista_id']); //Feu una clau composta
//            $table->id(); // esto si o ya hace de primary la primary
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artista_genere');
    }
};
