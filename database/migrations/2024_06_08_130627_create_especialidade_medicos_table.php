<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadeMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidade_medicos', function (Blueprint $table) {
            $table->foreignId('medico_id')->references('id')->on('medicos')
            ->onDelete('CASCADE');
            $table->foreignId('especialidade_id')->references('id')->on('especialidades')
            ->onDelete('CASCADE');
            $table->primary(['medico_id', 'especialidade_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidade_medicos');
    }
}
