<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fileModel;

class fileController extends Controller
{
    public function fileInsert(Request $request){


    	$filepath  = $request -> file('fileKey')->store('images');

    	$dbFilePath = substr($filepath, 7);

 		return fileModel::insert(['filepath'=> $dbFilePath]);
    }

    public function retriveFile(){
 		$result =  fileModel::get();
 		return $result;
    }

    
}
