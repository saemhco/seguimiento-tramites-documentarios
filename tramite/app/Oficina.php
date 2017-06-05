<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    
    protected $table = 'oficinas';
    protected $fillable = [
    	'nombre', 'facultads_id'
    ];
    public function facultad(){
    	return $this->belongsTo('App\Facultad','facultads_id');
    }
    public function usuarios(){
    	return $this->hasMany('App\User','oficinas_id');
    }
    public function registros(){
        return $this->hasMany('App\Registro','oficinas_id');
    }
}
