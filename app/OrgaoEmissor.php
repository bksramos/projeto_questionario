<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgaoEmissor extends Model
{
    protected $guarded = [];

    public function documentos()
    {
    	return $this->belongsToMany('App\Documento');
    }
}
