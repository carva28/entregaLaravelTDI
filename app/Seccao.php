<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seccao extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nome_seccao',
    ];
}
