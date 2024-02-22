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
        Schema::create('ouvidoria_questions_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('response_id');
            $table->integer('n_question');
            $table->enum('info', [
                'Ótimo',
                'Bom',
                'Regular',
                'Ruim',
                'Péssimo',
                'Sim',
                'Não',
                'Limpeza Pública',
                'Segurança',
                'Infraestrutura',
                'Turismo',
                'Saúde',
                'Não Informado'
            ])->nullable();
            $table->string('comment');
            $table->timestamps();

            $table->foreign('response_id')->references('id')->on('ouvidoria_responses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvidoria_questions_responses');
    }
};
