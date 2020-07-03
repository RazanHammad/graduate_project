<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
class xssController extends Controller
{public function split(){
   


        $file = fopen(storage_path("/app/emerging.rules/rules/xss.txt"), "r");
          while(!feof($file)) {
        $line=fgets($file);

        if(substr($line, 0, 5 ) === "alert"){
            
             $msg_db="";$flow_db="";$depth_db="";$reference_db="";$classtype_db="";$sid_db="";$rev_db="";$metadata_db="";
                $token = strpos($line, "(");
            $token=substr($line,$token+1,-1);
            //dd($token);
                $token = strtok($token, ";");

                //dd($token);
                //print_r($token);
            $myArray=array();
            while ($token !== false)
                {
                array_push($myArray,$token);
                $token = strtok(";");
               
                //

                    }
                   //dd($myArray);
             $content=array();
foreach ($myArray as $item){
    
    if (strpos($item, 'content') !== false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $item=json_decode($item);
        //print_r($item);
        array_push($content,$item);
 
    }

    if (strpos($item, "msg")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $msg_db=$item;
        $msg_db=str_replace('"',' ',$msg_db);}

   
     if (strpos($item, "flow")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $flow_db=$item;
        $flow_db=str_replace('"',' ',$flow_db);}
    

        if (strpos($item, "depth")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $depth_db=$item;
        $depth_db=str_replace('"',' ',$depth_db);}
        
    

           if (strpos($item, "reference")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $reference_db=$item;
        $reference_db=str_replace('"',' ',$reference_db);}
         
    

              if (strpos($item, "classtype")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $classtype_db=$item;
        $classtype_db=str_replace('"',' ',$classtype_db);}
         

                  if (strpos($item, "sid")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $sid_db=$item;
        $sid_db=str_replace('"',' ',$sid_db);}
        
   

        if (strpos($item, "rev")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $rev_db=$item;
        $rev_db=str_replace('"',' ',$rev_db);}
        
    

         if (strpos($item, "metadata")!==false) {
        $i=strpos($item,':');
        $item=substr($item,$i+1);
        $metadata_db=$item;
        $metadata_db=str_replace('"',' ',$metadata_db);}
         
    

}
//dd($content);
$content=json_encode($content);

      

           DB::insert('insert into xss_roles(msg,content,ref,class_type,sid,rev,meta_data)values(?,?,?,?,?,?,?)',[$msg_db,$content,$reference_db,$classtype_db,$sid_db,$rev_db,$metadata_db]);   }

            }
        }

     public function http(){

		  $client = HttpClient::create();
 
 /* $response = $client->request('GET', 'http://40.117.145.31?name=<script>
window.onload = function() {
var link=document.getElementsByTagName("a");link[0].href="https://www.google.com/";}
</script>');*/
$response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(1)</script>');
  $content = $response->toStream();

      $uri=$response->getInfo('url');

      $traf_cont=urldecode($uri);
      dd($traf_cont);
      $Requested_server=$response->getInfo('primary_ip');
      $client_ip=$response->getInfo('local_ip');
      $local_port=$response->getInfo('local_port');
      $primary_port=$response->getInfo('primary_port');
      $scheme=$response->getInfo('scheme');
      $content_type=$response->getInfo('content_type');
$content=DB::select('select content from xss_roles');
      foreach ($content as $content1) {
         
         $con= json_decode($content1->content);
         
          foreach ($con as $match) {
              if(!is_null($match)){
             if (strpos($traf_cont,$match) !== false){

                $con= $content1->content;
        $msg=DB::select('select msg from xss_roles where content =? ',[$con] );
        
           
             print_r($msg[0]->msg);
        }
              }

          }
        



              
}

           

     
}}

