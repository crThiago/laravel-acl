<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';
    protected $fillable = ['nome', 'descricao'];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
    
    public function permissoes()
    {
      return $this->belongsToMany(Permissao::class);
    }

    public function adicionarPermissao(Permissao $permissao)
    {
      if ($this->existePermissao($permissao)) {
        return;
      }

      return $this->permissoes()->attach($permissao);
    }

    public function removePermissao(Permissao $permissao)
    {
      return $this->permissoes()->detach($permissao->id);
    }

    public function existePermissao($permissao)
    {
      if (is_string($permissao))
      {
        $permissao = Permissao::where('nome', '=', $permissao)->firstOrFail();
      }

      return (boolean) $this->permissoes()->find($permissao->id);
    }
}
