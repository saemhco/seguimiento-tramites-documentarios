<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descargo extends Model
{
    protected $table = 'descargos';
    protected $primarykey = 'id';
    protected $fillable = [
    'tipo_doc', 'cardex', 'receptor', 'registros_id', 'users_id','users_ed' 
    ];

    public function registro(){
    	return $this->belongsTo('App\Registro','registros_id');
    }
    public function user(){
    	return $this->belongsTo('App\User','users_id');
    }
}
