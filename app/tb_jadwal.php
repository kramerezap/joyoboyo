<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_jadwal extends Model
{
     
     protected $table ='tb_jadwal';
    protected $fillable = [
        'ID_JADWAL', 'ID_SAKLAR', 'WAKTU_JADWAL', 'AKSI_JADWAL','STATUS_JADWAL'
    ];
   public $timestamps = false;
}
