<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class splitControllerv2 extends Controller
{
    public function split(){
    	$file = fopen(storage_path("/app/emerging.rules/rules/emerging-web_server.rules"), "r");
    	  while(!feof($file)) {
        $line=fgets($file);
        if(substr($line, 0, 5 ) === "alert"){
		 foreach(explode('(',$line) as $row){
      //dd($row);
     	if(strpos($row, "msg") !== false ){
           $msg =explode(";", substr($row, strpos($row, "msg") + 4)) ;
		 	 $msg_db=$msg[0];

//print_r($msg[0]);
         $flow =explode(";", substr($row, strpos($row, "flow") + 5)) ;
          $flow_db=$flow[0];
           
           $content =explode(";", substr($row, strpos($row, "content") + 8)) ;
           $content_db= $content[0];
               
                $depth =explode(";", substr($row, strpos($row, "depth") + 6)) ;
                $depth_db=$depth[0];
      
      $reference =explode(";", substr($row, strpos($row, "reference") + 10)) ;
      $reference_db=$reference[0];
      
      $classtype =explode(";", substr($row, strpos($row, "classtype") + 10)) ;
      $classtype_db=$classtype[0];
           
            $sid =explode(";", substr($row, strpos($row, "sid") + 4)) ;
            $sid_db=$sid[0];

                  $rev =explode(";", substr($row, strpos($row, "rev") + 4)) ;
                  $rev_db=$rev[0];

                        $metadata =explode(";", substr($row, strpos($row, "metadata") + 9)) ;
                        $metadata_db=$metadata[0];

                 /* DB::insert('insert into web_server_roles(msg,content,ref,class_type,sid,rev,meta_data)values(?,?,?,?,?,?,?)',[$msg_db,$content_db,$reference_db,$classtype_db,$sid_db,$rev_db,$metadata_db]);*/


      }
            

      }
          
      


	



        }}
    }
}
