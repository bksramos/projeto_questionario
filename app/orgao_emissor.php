<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orgao_emissor extends Model
{
    protected $guarded = [];

    public function documentos()
    {
    	return $this->belongsToMany('App\documento');
    }
}
