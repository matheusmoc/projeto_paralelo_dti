<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterUsuarioRelacionamentoRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()           
    {
        
                //id unico de usuario com varios regisros

        Schema::table('registros', function (Blueprint $table) {
            //insere um registro de users para relacionamento
            $user_id =  DB::table('users')->insertGetId([
                'name' => 'Matheus',
                'email' => 'matheusandrade009@gmail.com',
                'password' =>'teste',
                'cpf'=> '000.000.000.00',
                'cidade' => 'Montes Claros',
                'estado' => 'MG',
                'unidade' => 'Unimontes',
                'telefone'=> '38 99270-9671',
                'cargo' => 'Estagiário'



            ]);


            $table->unsignedBigInteger('user_id')->default($user_id)->after('id'); //colocar a ditreita da coluna id
            $table->foreign('user_id')->references('id')->on('users'); //constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('registros', function (Blueprint $table) {
            //tabela    //foreign key //foreign 
            $table->dropForeign('registros_user_id_foreign');
            $table->dropColumn('user_id'); //drop
        });
    }
}