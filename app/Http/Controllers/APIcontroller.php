<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user;
use App\tb_saklar;
use App\tb_log;
use App\tb_jadwal;
use App\view_jadwal1;
use Response;
class APIcontroller extends Controller
{
    


    function saklarAndroid() {
 $saklar = tb_saklar::get();

  $response['status'] = 'OK';
  $response['result'] = $saklar;

  return Response::json($response);
 }


  function penjadwalansaklar() {
 $jadwal = view_jadwal1::get();

  $response['status'] = 'OK';
  $response['result'] = $jadwal;

  return Response::json($response);
 }

 public function updatesaklarAndroidmati(Request $request, $id)
    {
        $data = DB::table('tb_saklar')->where('ID_SAKLAR',$id)->update(['STATUS_SAKLAR'=>0]);
   
        
    }
     public function updatesaklarAndroidhidup(Request $request, $id)
    {
        $data = DB::table('tb_saklar')->where('ID_SAKLAR',$id)->update(['STATUS_SAKLAR'=>1]);
   
        
    }

public function tambahlog(Request $request)
    {
      

        $data = new tb_log();
       
        $data->ID_SAKLAR = $request->ID_SAKLAR;
        $data->ID_USER = $request->ID_USER;

        $data->AKSI_LOG = $request->AKSI_LOG;
        
        $data->save();
        
       
    } 

   
 

    function loginAndroid(Request $request) {
  $logins = DB::table('user')
   ->where('USERNAME', $request->username)
   ->where('PASSWORD', $request->password)
   ->get();

  if (count($logins) > 0) {
   foreach ($logins as $logg) {
    $result["success"] = "1";
    $result["message"] = "success";
    //untuk memanggil data sesi Login
    $result["ID_USER"] = $logg->ID_USER;
    $result["NAMA"] = $logg->NAMA;
    $result["USERNAME"] = $logg->USERNAME;
    $result["PASSWORD"] = $logg->PASSWORD;
     $result["LEVEL"] = $logg->LEVEL;
   }
   echo json_encode($result);
  } else {
   $result["success"] = "0";
   $result["message"] = "error";
   echo json_encode($result);
  }
 }

 public function tambahjadwalAndroid(Request $request)
    {
        $ID_SAKLAR = $request->ID_SAKLAR;
        $WAKTU_JADWAL = $request->WAKTU_JADWAL;
        $AKSI_JADWAL = $request->AKSI_JADWAL;
        $STATUS_JADWAL = 1;

        $data = new tb_jadwal();
        $data->ID_SAKLAR = $ID_SAKLAR;
        $data->WAKTU_JADWAL = $WAKTU_JADWAL;
        $data->AKSI_JADWAL = $AKSI_JADWAL;
        $data->STATUS_JADWAL = $STATUS_JADWAL;
        $data->save();
        
        
    } 
      public function hapusjadwalAndroid($id)
    {
        DB::table('tb_jadwal')->where('ID_JADWAL',$id)->delete();

    }


       public function alarm()
    {
        $results = DB::select('select * from alarm where WAKTU_JADWAL in (select min(WAKTU_JADWAL) from alarm)');
        $response['status'] = 'OK';
        $response['result'] = $results;

  return Response::json($response);

    }
  public function updatestatusAndroidmati(Request $request, $id)
    {
        $data = DB::table('tb_jadwal')->where('ID_JADWAL',$id)
        ->update(['STATUS_JADWAL'=>0]);
    }
public function updatestatusAndroidhidup(Request $request, $id)
    {
        $data = DB::table('tb_jadwal')->where('ID_JADWAL',$id)
        ->update(['STATUS_JADWAL'=>1]);
    } 

public function deletejadwal($id)
    {
        DB::table('tb_jadwal')->where('ID_JADWAL',$id)->delete();
        
    } 

public function updatejadwal(Request $request, $id)
    {
       $ID_JADWAL = $request->ID_JADWAL;
        $ID_SAKLAR = $request->ID_SAKLAR;
        $WAKTU_JADWAL = $request->WAKTU_JADWAL;
         $AKSI_JADWAL = $request->AKSI_JADWAL;
        $STATUS_JADWAL = $request->STATUS_JADWAL;

       

        $data = DB::table('tb_jadwal')->where('ID_JADWAL',$id)
        ->update(['ID_SAKLAR'=>$ID_SAKLAR,'WAKTU_JADWAL'=>$WAKTU_JADWAL,'AKSI_JADWAL'=>$AKSI_JADWAL,'STATUS_JADWAL'=>$STATUS_JADWAL]);
        
        
    }   

    public function arduino()
    {
        $results = DB::select('select ID_SAKLAR, STATUS_SAKLAR from tb_saklar');
        foreach ($results as $key) {
          echo $key->ID_SAKLAR.$key->STATUS_SAKLAR;
        }

}



}