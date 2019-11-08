<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentImage extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'ficheiro_image','jornal_id'
    ];

    public function jornal(){
        return $this->belongsTo('App\Jornal','jornal_id');
    }
}
