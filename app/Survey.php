<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
