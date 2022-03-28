<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_log extends Model
{
       protected $table ='tb_log';
    protected $fillable = [
        'ID_LOG', 'ID_USER', 'ID_SAKLAR','WAKTU_LOG','AKSI_LOG'
    ];
   
 public $timestamps = false;
}
