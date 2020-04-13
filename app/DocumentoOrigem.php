<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoOrigem extends Model
{
    protected $guarded = [];

    public function documentos()
    {
    	return $this->belongsToMany('App\Documento');
    }
}
