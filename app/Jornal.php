<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jornal extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name_jornal','description','user_id'
    ];


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
