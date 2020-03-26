<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documento_tipo extends Model
{
    protected $guarded = [];

    public function documentos()
    {
    	return $this->belongsToMany('App\documento');
    }
}
