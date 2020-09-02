<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loginModel;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function insert(Request $r){

    	$name = $r ->input('name');
        //Check Password
    	$pass = $r ->input('password');
        $dbPass = loginModel::Where('name',$name)->value('pass');
        $passCheck = Hash::check($pass, $dbPass);
        $userCheck= loginModel::where('name', $name)->count();
    	
        if($userCheck == 1){
    		if($passCheck){
                $r-> session()->put('name', $name);
    			return 1;
    		}else{return 3;}
    	}else{return 2;}
    }

    public function resister(Request $r){

        $name = $r ->input('name');
        $pass = Hash::make($r->input('password'));
         $extName = loginModel::where('name',$name)->count();
        if ($extName == 0) {
              $result= loginModel::insert(['name'=>$name, 'pass'=>$pass]);
                if ($result) {return 1;}else{return 0;}
        }else{return 2;}
    }
    public function logout(Request $request){
            $request -> session()->flush();
    return redirect('/');}

}
