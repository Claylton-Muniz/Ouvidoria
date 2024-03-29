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
        Schema::create('ouvidoria_responses', function (Blueprint $table) {
            $table->id();
            $table->string('servidor');
            $table->string('entrevistado')->nullable();
            $table->unsignedBigInteger('tipo_form');
            $table->date('data_nasc')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->enum('sexo', ['Masculino', 'Feminino', 'Outro', 'Prefiro não informar'])->nullable();
            $table->text('mensagem')->nullable();
            $table->timestamps();

            $table->foreign('tipo_form')->references('id')->on('ouvidoria_forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvidoria_responses');
    }
};
