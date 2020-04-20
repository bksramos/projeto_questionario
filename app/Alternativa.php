<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    protected $guarded = [];

    public function questaos()
    {
    	return $this->belongsTo('App\Questao');
    }

//    public function respostas()
//    {
//        return $this->hasMany('App\Resposta');
//    }
}
