<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function carros()
    {
      return $this->belongsToMany('App\Carro');
    }

    public function chamados()
    {
      return $this->belongsToMany('App\Chamado');
    }

    public function eAdmin()
    {
      // return $this->id == 1;
      return $this->existePapel('Admin');
    }

    public function papeis()
    {
      return $this->belongsToMany(Papel::class);
    }

    public function adicionarPapel(Papel $papel)
    {
      // if (is_string($papel)) {
      //   dd($papel);
      //   $papel = Papel::where('nome', '=', $papel)->firstOrFail();
      // }

      if ($this->existePapel($papel)) {
        return;
      }

      return $this->papeis()->attach($papel);
    }

    public function removePapel(Papel $papel)
    {
      return $this->papeis()->detach($papel->id);
    }

    public function existePapel($papel)
    {
      if (is_string($papel))
      {
        $papel = Papel::where('nome', '=', $papel)->firstOrFail();
      }

      return (boolean) $this->papeis()->find($papel->id);
    }

    public function temUmPapelDestes($papeis)
    {
      $userPapeis = $this->papeis;
      return $papeis->intersect($userPapeis)->count();
    }
}
