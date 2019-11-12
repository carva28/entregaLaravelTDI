<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tema extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nome_tema'
    ];

}
