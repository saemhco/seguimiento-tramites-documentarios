<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{ 
    protected $table = 'facultads';
    protected $primarykey = 'id';
    protected $fillable = [
    	'nombre'
    ];
    public function oficinas(){
        return $this->hasMany('App\Oficina', 'facultads_id');
    }
}
