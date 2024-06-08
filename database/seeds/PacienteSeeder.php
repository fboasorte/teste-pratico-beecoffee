<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            'nome' => 'Joaquim',
            'cpf' => '70392346028',
            'data_nascimento' => '1978-05-30',
            'email' => 'joaquim@mail.com'
        ]);
    }
}
