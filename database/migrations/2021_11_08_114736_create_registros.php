<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->text('nome')->default();
            $table->text('sobrenome')->default();
            $table->text('email')->default();
            $table->string('status')->default();
            $table->string('unidade')->default();
            $table->text('descricao', 1500)->default();
            $table->integer('registro_assunto');
            $table->ipAddress('ip');
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
        Schema::dropIfExists('registros');
    }
}
