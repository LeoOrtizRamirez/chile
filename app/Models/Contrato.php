<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    public function fuente(){
        return $this->belongsTo('App\Models\Fuente', 'id_fuente_contract', 'id');
    }

    public function contratista(){
        return $this->hasMany('App\models\ContratoContratista', 'id', 'id_contrato');
    }
}
