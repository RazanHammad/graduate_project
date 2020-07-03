<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class sqliControllerv1 extends Controller
{
	public function split(){
   


        $file = fopen(storage_path("/app/emerging.rules/rules/sqli.txt"), "r");
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
$content=json_encode($content);
           DB::insert('insert into sqli_rules(msg,content,ref,class_type,sid,rev,meta_data)values(?,?,?,?,?,?,?)',[$msg_db,$content,$reference_db,$classtype_db,$sid_db,$rev_db,$metadata_db]);   }

            }
        }
 public function http(){
		  $client = HttpClient::create();
$response = $client->request('POST', 'http://40.117.145.31/multi_query.php', [
     'headers' => [
        'Content-Type' =>  'application/x-www-form-urlencoded',
    ],
    'body' => ['uid' => "';INSERT INTO user_details (userid, password) VALUES ('23','sam'); --"],
]);
$content = $response->toStream();
      $uri=$response->getInfo('url');
      $traf_cont=urldecode($uri);
      $Requested_server=$response->getInfo('primary_ip');
      $client_ip=$response->getInfo('local_ip');
      $local_port=$response->getInfo('local_port');
      $primary_port=$response->getInfo('primary_port');
      $scheme=$response->getInfo('scheme');
      $content_type=$response->getInfo('content_type');
$content=DB::select('select content from sqli_rules');
$traf_cont=json_decode($response->getContent());
      foreach ($content as $content1) {
        
         $con= json_decode($content1->content);
         
          foreach ($con as $match) {
              if(!is_null($match)){
             if (strpos($traf_cont[0],$match) !== false){
                $con= $content1->content;
        $msg=DB::select('select msg from sqli_rules where content =? ',[$con] );
              
             $ip= DB::select('select client_ip from logs where client_ip =?',[$client_ip]);
            // dd($ip);
              $count=0;
                 //$dt=date("m/d/y h:i:s a", time());
             //$dt=date("m/d/y h:i:s a", time());
             //$dt=time();
              $dt=0;
            if (empty($ip)) {
              $count=$count+1;
                
              $expected_block_time = 0;
              DB::insert("insert into logs (Requested_server,primary_port,client_ip,local_port,scheme,content_type,traf_cont,count,dt,expected_block_time)value (?,?,?,?,?,?,?,?,?,?)",[$Requested_server,$primary_port,$client_ip,$local_port,$scheme,$content_type,$traf_cont[0],$count,$dt,$expected_block_time]);
             // header("Location: http://40.117.145.31");
                header("Location: http://127.0.0.1:8000/error");
                exit();
            }

            else
            {

                $count = DB::select('select count from logs where client_ip = ?',[$client_ip]);
                $count=($count[0]->count)+1;
                $request_time = DB::select('select dt from logs where client_ip = ?',[$client_ip]);
              $input = date('Y-m-d H:i',strtotime('+1 hour',strtotime(($request_time[0]->dt))));
              //dd(gettype($input));
              //$date = strtotime($input); 
                //$newformat=date('d/M/Y h:i:s', $date);
              
                if ($count >= 3) {
                  DB::table('logs')->update(['expected_block_time' =>( $input+ 60*60)]);
                }
               
                  //dd($ip);
               // DB::table('logs')->update(['count' => $count,'dt' => $dt]);
                DB::table('logs')->update(['count' => $count]);
                //DB::update('update logs set (dt,count) = ',[$dt,$count]);
               // DB::update('update users set votes = 100 where name = ?', ['John']);
              //  dd(1);
                header("Location: http://40.117.145.31");
                exit();
                 // $expected_block_time= DB::select('select expected_block_time from logs where client_ip = ?',[$client_ip]);
                 $ip= DB::select('select client_ip from logs where client_ip =?',[$client_ip]);
                if (!empty($ip) && $count>=3 && $dt >=$expected_block_time ) {
                      header("Location: http://127.0.0.1:8000/error");
                      exit();
                }

            }






      
         /*$logs ="Primary ip:". $Requested_server ."Primary Port:" . $primary_port. "Client ip:". $client_ip . "local port :" .$local_port ."Scheme:" .$scheme."content_type:" .$content_type."traf_cont:".$traf_cont[0]."time_requested:".$dt."\n"."-----------------------------------";
        $file = file_put_contents(storage_path("log.txt"), $logs.PHP_EOL , FILE_APPEND | LOCK_EX);*/
      
        
 
        
        }

       
              }

          }         
}  
}
    
}
