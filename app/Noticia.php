<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'titulo_noticia','corpo_noticia','jornal_id','seccao_id','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function jornal(){
        return $this->belongsTo('App\Jornal','jornal_id');
    }

    public function seccao(){
        return $this->belongsTo('App\Seccao','seccao_id');
    }
}
