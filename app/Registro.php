<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';
    protected $primarykey = 'id';
    protected $fillable = [
    	'n', 'documento', 'emisor', 'asunto', 'adjunto', 'oficinas_id', 'users_id', 'users_ed','desc'
    ];
    public function descargo(){
    	return $this->hasOne('App\Descargo','registros_id');
    }
    public function user(){
    	return $this->belongsto('App\User','users_id');
    }
    public function oficina(){
        return $this->belongsto('App\Registro','oficinas_id');
    }
}
