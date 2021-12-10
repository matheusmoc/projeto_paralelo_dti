<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterRegistrosAddFkRegistroAssuntos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         //adicionando a coluna motivo_contatos_id
         Schema::table('registros', function (Blueprint $table) {
            $table->unsignedBigInteger('registro_assuntos_id');
        });

        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update registros set registro_assuntos_id = registro_assunto');

        //criando a fk e removendo a coluna motivo_contato
        Schema::table('registros', function (Blueprint $table) {
            $table->foreign('registro_assuntos_id')->references('id')->on('registro_assuntos');
            $table->dropColumn('registro_assunto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                //criar a coluna motivo_contato e removendo a fk
                Schema::table('registros', function (Blueprint $table) {
                    $table->integer('registro_assunto');
                    $table->dropForeign('registros_registro_assuntos_id_foreign');
                });
        
                //atribuindo motivo_contatos_id para a coluna motivo_contato
                DB::statement('update registros set registro_assunto = registro_assuntos_id');
        
                //removendo a coluna motivo_contatos_id
                Schema::table('registro', function (Blueprint $table) {
                    $table->dropColumn('registro_assuntos_id');
                });
    }
}

