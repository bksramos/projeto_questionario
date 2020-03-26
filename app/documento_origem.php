<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documento_origem extends Model
{
    protected $guarded = [];

    public function documentos()
    {
    	return $this->belongsToMany('App\documento');
    }
}
