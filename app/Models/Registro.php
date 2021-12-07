<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //use HasFactory;
    protected $fillable = ['nome', 'sobrenome', 'email', 'status', 'unidade', 'descricao', 'registro_assuntos_id', 'ip', 'user_id'];


    public function assunto(){ //'registro' PERTENCE A 'registro_assunto'
        return $this->belongsTo(RegistroAssunto::class, 'registro_assuntos_id');
    }
    public function user(){   //'registro' TEM UM'user'
        return $this->belongsTo(User::class, 'user_id');
   }
}

