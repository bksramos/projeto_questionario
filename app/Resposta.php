<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $guarded = [];

    public function documento()
    {
    	return $this->belongsTo(Documento::class)->withTimestamps();
    }

    public function questao()
    {
    	return $this->belongsTo(Questao::class);
    }

    public function alternativas()
    {
        return $this->belongsToMany(Alternativa::class);
    }

}
