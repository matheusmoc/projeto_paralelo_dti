<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => 'admin123',
            'cpf'=> '000.000.000.00',
            'cidade' => 'Montes Claros',
            'estado' => 'MG',
            'unidade' => 'Unimontes',
            'telefone'=> '38 99270-9671',
            'cargo' => 'Estagiário'
        ]);

        User::create([
            'name' => 'admin2',
            'email' => 'admin2@admin',
            'password' => 'admin123',
            'cpf'=> '000.000.000.00',
            'cidade' => 'Januária',
            'estado' => 'MG',
            'unidade' => 'Unimontes',
            'telefone'=> '38 9999-9999',
            'cargo' => 'Efetivo'
        ]);

    }
}