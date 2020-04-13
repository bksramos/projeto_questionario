<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $guarded = [];

    public function questao()
    {
    	return $this->belongsTo(Questao::class);
    }

//    public function questao()
//    {
//    	return $this->belongsTo('App\Questao');
//    }
//
    public function alternativas()
    {
        return $this->belongsToMany('App\Alternativa');
    }
}
