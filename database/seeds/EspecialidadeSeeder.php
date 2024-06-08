<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            'nome' => 'ACUPUNTURA',
        ]);

        DB::table('especialidades')->insert([
            'nome' => 'ADMINISTRAÇÃO EM SAÚDE',
        ]);

        DB::table('especialidades')->insert([
            'nome' => 'ANESTESIOLOGIA',
        ]);

        DB::table('especialidades')->insert([
            'nome' => 'CARDIOLOGIA',
        ]);
    }
}
