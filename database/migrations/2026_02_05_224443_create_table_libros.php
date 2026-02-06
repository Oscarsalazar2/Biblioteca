<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->timestamps();
        });

        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 225);
            $table->string('autor', 100);
            $table->string('isbn')->unique();
            $table->string('editorial', 255);
            $table->smallInteger('estatus')->default(0);
            $table->timestamps();
            $table->foreignId('id_categoria')->constrained('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
        Schema::dropIfExists('categorias');
    }
};
