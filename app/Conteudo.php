<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conteudo extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'tipo_conteudo','ficheiro_conteudo','noticia_id','user_id'
    ];

    public function noticia(){
        return $this->belongsTo('App\Noticia','noticia_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
