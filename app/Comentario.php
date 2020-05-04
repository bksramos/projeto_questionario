<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $guarded = [];

    public function documento()
    {
        return $this->belongsTo(Documento::class)->withTimestamps();
    }

}
