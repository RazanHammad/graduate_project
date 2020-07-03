<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class splitControllerv3 extends Controller
{
    public function split(){
    	$file = fopen(storage_path("/app/emerging.rules/rules/rule.txt"), "r");
    	  while(!feof($file)) {
        $line=fgets($file);

        if(substr($line, 0, 5 ) === "alert"){
  //dd($line);
        // substr($line, (strpos($line, "msg") + 4));
      
        $msg= strtok( substr($line, (strpos($line, "msg") + 4)), ";");
         // print_r($msg);

           $flow= strtok( substr($line, (strpos($line, "flow") + 5)), ";");
          //print_r($flow);
            //there is a problem (existing more than one content)
             $content= strtok( substr($line, (strpos($line, "content") + 8)), ";");
            // print_r($content);
             
             //there is no depth in all rules
             $depth= strtok( substr($line, (strpos($line, "depth") + 6)), ";");
             //print_r($depth);
             //there is no reference in all rules
             $reference= strtok( substr($line, (strpos($line, "reference") + 10)), ";");
            // print_r($reference);
             $classtype= strtok( substr($line, (strpos($line, "classtype") + 10)), ";");
             //print_r($classtype);
              $sid= strtok( substr($line, (strpos($line, "sid") + 4)), ";");
             //print_r($sid);

              $rev= strtok( substr($line, (strpos($line, "rev") + 4)), ";");
               //print_r($rev);
                $metadata= strtok( substr($line, (strpos($line, "metadata") + 9)), ";");
                   //print_r($metadata);
      }
          
      


	



        }


      }
}
    

