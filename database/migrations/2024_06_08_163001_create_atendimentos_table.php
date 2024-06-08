<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('data_atendimento');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->foreignId('medico_id')->references('id')->on('medicos')
            ->onDelete('CASCADE');
            $table->foreignId('paciente_id')->references('id')->on('pacientes')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
