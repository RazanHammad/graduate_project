<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class splitController extends Controller
{
    public function split(){
    	$file = fopen(storage_path("/app/emerging.rules/rules/emerging-web_server.rules"), "r");
    	  while(!feof($file)) {
        $line=fgets($file);
        if(substr($line, 0, 5 ) === "alert"){
		 foreach(explode('(',$line) as $row){
		 $msg[]= "";$flow[]="";$content[]="";$depth="";$ref[]="";$classtype[]="";$sid[]="";$rev[]="";$metadata[]="";
		 	if(strpos($row, "msg") !== false){
          $msg =explode(";", substr($row, strpos($row, "msg") + 4)) ;
          dd($msg);
      }
          	if(strpos($row, "flow") !== false){
         $flow =explode(";", substr($row, strpos($row, "flow") + 5)) ;
         		//print_r($whatIWant1[0]);
}
				if(strpos($row, "content") !== false){
			$content =explode(";", substr($row, strpos($row, "content") + 8)) ;
			//print_r($content[0]);

}
			
		if(strpos($row, "depth") !== false){
			$depth =explode(";", substr($row, strpos($row, "depth") + 6)) ;
			//print_r($depth[0]);

}

	if(strpos($row, "reference") !== false){
			$ref =explode(";", substr($row, strpos($row, "reference") + 10)) ;
			//print_r($reference[0]);

		}

if(strpos($row, "classtype") !== false){
			$classtype =explode(";", substr($row, strpos($row, "classtype") + 10)) ;
			//dd($classtype[0]);

		}


if(strpos($row, "sid") !== false){
			$sid =explode(";", substr($row, strpos($row, "sid") + 4)) ;
			//dd($sid[0]);

		}
		
		if(strpos($row, "rev") !== false){
			$rev =explode(";", substr($row, strpos($row, "rev") + 4)) ;
			//dd($rev[0]);

		}

		if(strpos($row, "metadata") !== false){
			$metadata =explode(";", substr($row, strpos($row, "metadata") + 9)) ;
			//dd($meta_data[0]);

		}

		/*DB::insert('insert into web_server_roles(msg,content,cs,ref,class_type,sid,rev,meta_data)values(?,?,?,?,?,?)',[$msg,$content,$ref,$classtype,$sid,$rev,$metadata]);*/

        }}
    }
}}
