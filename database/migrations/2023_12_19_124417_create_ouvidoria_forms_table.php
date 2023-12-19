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
        Schema::create('ouvidoria_forms', function (Blueprint $table) {
            $table->id();
            $table->string('servidor');
            $table->string('entrevistado');
            $table->string('tipo_form');
            $table->date('data_atual')->nullable();
            $table->date('data_nasc');
            $table->string('email');
            $table->string('telefone');
            $table->string('endereco');
            $table->enum('sexo', ['Masculino', 'Feminino', 'Outro', 'Prefiro não informar']);
            $table->text('mensagem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvidoria_forms');
    }
};
