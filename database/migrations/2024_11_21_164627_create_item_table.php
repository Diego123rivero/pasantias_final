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
        Schema::create('item', function (Blueprint $table) {
            $table->id();  // Esto crea la columna 'id' como clave primaria
            $table->string('categoria');        // Atributo 'categoria' (NOT NULL)
            $table->string('subcategoria');     // Atributo 'subcategoria' (NOT NULL)
            $table->string('item');             // Atributo 'item' (NOT NULL)
            $table->string('marca')->nullable();    // Atributo 'marca' (PUEDE SER NULL)
            $table->string('modelo')->nullable();   // Atributo 'modelo' (PUEDE SER NULL)
            $table->string('serie')->nullable();    // Atributo 'serie' (PUEDE SER NULL)
            $table->string('color')->nullable();    // Atributo 'color' (PUEDE SER NULL)
            $table->string('estado');           // Atributo 'estado' (NOT NULL)
            $table->string('ubicacion');        // Atributo 'ubicacion' (NOT NULL)
            $table->string('codigo');
            
            $table->timestamps();              // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
