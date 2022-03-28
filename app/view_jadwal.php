<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class view_jadwal1 extends Model
{
     
     protected $view ='view_jadwal1';
    protected $fillable = [
        'ID_JADWAL', 'ID_SAKLAR','NAMA_SAKLAR', 'WAKTU_JADWAL', 'AKSI_JADWAL','STATUS_JADWAL'
    ];
   public $timestamps = false;
}
