<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
       protected $table ='user';
    protected $fillable = [
        'ID_USER', 'NAMA', 'USERNAME','PASSWORD','LEVEL'
    ];
   public $timestamps = false;

}
