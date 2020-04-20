<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $guarded = [];

    public function documentos()
    {
    	return $this->belongsToMany(Documento::class)->withTimestamps();
    }

    public function questaoCategorias()
    {
    	return $this->hasMany(QuestaoCategoria::class);
    }

    public function alternativas()
    {
    	return $this->hasMany('App\Alternativa');
    }

}
