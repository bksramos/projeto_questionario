<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestaoTipo extends Model
{
    protected $guarded = [];

    public function questaos()
    {
    	return $this->belongsToMany('App\Questao');
    }
}
