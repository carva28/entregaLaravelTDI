<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TemaJornal extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'jornal_id','tema_id'
    ];
    
    public function jornal(){
        return $this->belongsTo('App\Jornal','jornal_id');
    }

    public function tema(){
        return $this->belongsTo('App\Tema','tema_id');
    }
}
