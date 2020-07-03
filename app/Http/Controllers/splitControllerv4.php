<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class splitControllerv4 extends Controller
{
    public function split(){
    	$file = fopen(storage_path("/app/emerging.rules/rules/rule.txt"), "r");
    	  while(!feof($file)) {
        $line=fgets($file);

        if(substr($line, 0, 5 ) === "alert"){
  //dd($line);
        // substr($line, (strpos($line, "msg") + 4));
      $msg_db="";$flow_db="";$content_db="";$depth_db="";$reference_db="";$classtype_db="";$sid_db="";$rev_db="";$metadata_db="";


        if (strpos($line, "msg")!==false) {
          $msg_db= strtok( substr($line, (strpos($line, "msg") + 4)), ";");
         // print_r($msg);
           $msg_db=str_replace('"',' ',$msg_db);
        }
        else{$msg_db="NA";
       $msg_db=str_replace('"',' ',$msg_db);}
       //dd($msg_db);
              if (strpos($line, "flow")!==false) {
              $flow_db= strtok( substr($line, (strpos($line, "flow") + 5)), ";");
          $flow_db=str_replace('"',' ',$flow_db);
              }
           else{$flow_db="NA";
          $flow_db=str_replace('"',' ',$flow_db);}
            //there is a problem (existing more than one content)

           if (strpos($line, "content")!==false) {
                if (substr_count($line, "content")>1) {
                    dd("true");                }
            $content_db= strtok( substr($line, (strpos($line, "content") + 8)), ";");
            // print_r($content);
             $content_db=str_replace('"',' ',$content_db);
           }else{$content_db="NA";
          $content_db=str_replace('"',' ',$content_db);}
             //dd($content_db);
             
             //there is no depth in all rules
           if (strpos($line, "depth")!==false) {
            $depth_db= strtok( substr($line, (strpos($line, "depth") + 6)), ";");
             //print_r($depth);
             $depth_db=str_replace('"',' ',$depth_db);
           }else{$depth_db="NA";
             $depth_db=str_replace('"',' ',$depth_db);
         }
             
             //there is no reference in all rules
           if (strpos($line, "reference")!==false) {
             $reference_db= strtok( substr($line, (strpos($line, "reference") + 10)), ";");
            // print_r($reference);
             $reference_db=str_replace('"',' ',$reference_db);
           }else{$reference_db="NA";
          $reference_db=str_replace('"',' ',$reference_db);}
            //dd($depth_db);
            if (strpos($line, "reference")!==false) {
            $classtype_db= strtok( substr($line, (strpos($line, "classtype") + 10)), ";");
             //print_r($classtype);
             $classtype_db=str_replace('"',' ',$classtype_db);
            }else {
              $classtype_db="NA";
               $classtype_db=str_replace('"',' ',$classtype_db);
            }
             if (strpos($line, "sid")!==false) {
              $sid_db= strtok( substr($line, (strpos($line, "sid") + 4)), ";");
             //print_r($sid);
               $sid_db=str_replace('"',' ',$sid_db);
             }else
             {$sid_db="NA";
            $sid_db=str_replace('"',' ',$sid_db);}
              
              if (strpos($line, "rev")!==false) {

                $rev_db= strtok( substr($line, (strpos($line, "rev") + 4)), ";");
                $rev_db=str_replace('"',' ',$rev_db);
               //print_r($rev);
              }else{$rev_db="NA";
             $rev_db=str_replace('"',' ',$rev_db);}
              if (strpos($line, "metadata")!==false) {
              $metadata_db= strtok( substr($line, (strpos($line, "metadata") + 9)), ";");
               $metadata_db=str_replace('"',' ',$metadata_db);
                   //print_r($metadata);
              }else{$metadata_db="NA";
             $metadata_db=str_replace('"',' ',$metadata_db);}
                
      }
          
      


	



        }


      }
              }

    

