<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\RegistroAssunto;

class CreateRegistroAssuntos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_assuntos', function (Blueprint $table) {
            $table->id();
            $table->string('registro_assunto', 20)->nullable();
            $table->timestamps();
        });

        // RegistroAssunto::create(['registro_assunto' => 'Sistemas']);      
        // RegistroAssunto::create(['registro_assunto' => 'Cadastro']);
        // RegistroAssunto::create(['registro_assunto' => 'Processos']);
        // Cria rows autmático ao fazer a migration, porém o certo é ser feito no seeder
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_assuntos');
    }
}
