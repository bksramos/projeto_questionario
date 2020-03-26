<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    protected $guarded = [];

    public function documento_origems()
    {
    	return $this->hasOne('App\documento_origem');
    }

    public function documento_tipos()
    {
    	return $this->hasOne('App\documento_tipo');
    }
    public function orgao_emissors()
    {
    	return $this->hasOne('App\orgao_emissor');
    }
}
