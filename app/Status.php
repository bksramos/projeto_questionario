<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = [];

    public function documentos()
    {
        return $this->belongsToMany(Documento::class)->withPivot('documento_id', 'status_id')->withTimestamps();
    }
}
