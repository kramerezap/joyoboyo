<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_saklar extends Model
{
     
     protected $table ='tb_saklar';
    protected $fillable = [
        'ID_SAKLAR', 'NAMA_SAKLAR', 'STATUS_SAKLAR'
    ];
   public $timestamps = false;
}
