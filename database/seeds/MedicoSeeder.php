<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            'nome' => 'Joaquim',
            'crm' => '10844-SP',
        ]);
    }
}
