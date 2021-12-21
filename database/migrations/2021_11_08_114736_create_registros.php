<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            // $user_id =  DB::table('users')->insertGetId([
            //     'name' => 'Matheus',
            //     'email' => 'matheusandrade009@gmail.com',
            //     'password' =>'teste',
            //     'cpf'=> '000.000.000.00',
            //     'cidade' => 'Montes Claros',
            //     'estado' => 'MG',
            //     'unidade' => 'Unimontes',
            //     'telefone'=> '38 99270-9671',
            //     'cargo' => 'Estagiário'



            // ]);



            $table->id();
            $table->text('nome');
            $table->text('sobrenome');
            $table->text('email');
           
            $table->string('status')->nullable();
            $table->string('unidade')->nullable();
           
            $table->text('descricao', 1500);
            $table->integer('registro_assunto');
            $table->ipAddress('ip');
            
            $table->unsignedBigInteger('user_id')->default();
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::disableForeignKeyConstraints();
        Schema::dropSoftDeletes();
        Schema::dropIfExists('registros');
        Schema::enableForeignKeyConstraints();
    }
}