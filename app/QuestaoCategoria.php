<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestaoCategoria extends Model
{
    protected $guarded = [];

    public function questaos()
    {
    	return $this->belongsToMany(Questao::class);
    }
}
