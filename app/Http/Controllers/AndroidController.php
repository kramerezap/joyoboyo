<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\user;
use App\tb_saklar;
use App\tb_log;

class AndroidController extends Controller
{
    public function logandroid(){
    if(!Session::get('login')){
            return redirect('logandroid')->with('alert','Kamu harus login dulu');
        }
        else{
           return redirect('dashboardandroid');
        }
    	
    }

public function logout(){
        Session::flush();
        return redirect('logandroid')->with('alert','Kamu sudah logout');
    }

    public function loginactionandroid(Request $request){

        $USERNAME = $request->USERNAME;
        $PASSWORD = $request->PASSWORD;
        
        $data = DB::table('user')->where([['USERNAME',$USERNAME],['PASSWORD',$PASSWORD]])->get();
        if(count($data) > 0) {
            Session::put('USERNAME',$USERNAME);
            Session::put('PASSWORD',$PASSWORD);
            Session::put('login',TRUE);
            
            return redirect('dashboard');

        }
        else {
        	Session::put('message', 'Email atau Password tidak cocok !'); 
            return redirect('logandroid');

            }
    }

    public function dashboardandroid(){
    
    	return view('Android/dashboard');
    }
    public function petugas(){
    
    	return view('petugas');
    }
    public function saklar(){
    
    	return view('saklar');
    }
     public function log(){
    
        return view('log');
    }

    public function tambahpetugas(Request $request)
    {
        $NAMA = $request->namapetugas;
        $USERNAME = $request->username;
        $PASSWORD = $request->password;
        $LEVEL = 2;

        $data = new user();
        $data->NAMA = $NAMA;
        $data->USERNAME = $USERNAME;
        $data->PASSWORD = $PASSWORD;
        $data->LEVEL = $LEVEL;
        $data->save();
        
        return redirect('petugas');
    } 
    public function hapuspetugas($id)
    {
        DB::table('user')->where('ID_USER',$id)->delete();
        return redirect('/petugas');
    }
    public function updatepetugas(Request $request, $id)
    {
        $NAMA = $request->namapetugas;
        $USERNAME = $request->username;
        $PASSWORD = $request->password;
        

       

        $data = DB::table('user')->where('ID_USER',$id)->update(['NAMA'=>$NAMA,'USERNAME'=>$USERNAME,'PASSWORD'=>$PASSWORD]);
        return redirect('/petugas');
        
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

}

