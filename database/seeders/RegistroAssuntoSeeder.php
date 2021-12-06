<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RegistroAssunto;

class RegistroAssuntoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegistroAssunto::create(['registro_assunto' => 'Sistemas']);      
        RegistroAssunto::create(['registro_assunto' => 'Cadastro']);
        RegistroAssunto::create(['registro_assunto' => 'Processos']);  //php artisan db:seed --class=RegistroAssuntoSeeder
    }
}
