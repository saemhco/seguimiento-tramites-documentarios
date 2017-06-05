<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Carbon\Carbon;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primarykey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','dni', 'email', 'password', 'foto', 'funcion', 'oficinas_id'];

    
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function registros(){
        return $this->hasMany('\App\Registro','users_id');
    }
    public function descargos(){
        return $this->hasMany('App\Descargo','users_id');
    }
    public function oficina(){
        return $this->belongsTo('App\Oficina','oficinas_id');
    }
    public function setPasswordAttribute($valor){
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::Make($valor);
        }
    }

   /* public function setFotoAttribute($foto){
        $name = Carbon::now()->second.$foto->getClientOriginalName();
        $this->attributes['foto'] = $name;
        \Storage::disk('local')->put($name, \File::get($foto));
    }
   */ 
}
