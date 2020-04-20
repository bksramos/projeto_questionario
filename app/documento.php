<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $guarded = [];

    public function documentoOrigems()
    {
    	return $this->hasOne(DocumentoOrigem::class, 'id', 'documento_origem_id');
    }

    public function documentoTipos()
    {
    	return $this->hasOne(DocumentoTipo::class, 'id', 'documento_tipo_id');
    }
    public function orgaoEmissors()
    {
    	return $this->hasOne(OrgaoEmissor::class, 'id', 'orgao_emissor_id');
    }
    public function questaos()
    {
        return $this->belongsToMany(Questao::class)->withTimestamps();
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class)->withPivot('documento_id', 'status_id')->withTimestamps();
    }
}
