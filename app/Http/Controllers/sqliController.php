<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
//use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
//use Request;

class sqliController extends Controller
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
//dd($content);
$content=json_encode($content);

      

           DB::insert('insert into sqli_rules(msg,content,ref,class_type,sid,rev,meta_data)values(?,?,?,?,?,?,?)',[$msg_db,$content,$reference_db,$classtype_db,$sid_db,$rev_db,$metadata_db]);   }

            }
        }
 public function http(){


//$py=storage_path('python.py');
//$test = shell_exec('python'+$py);
//dd($test);
//$process = new Process('python '+$py);
//$command = escapeshellcmd($py);
//$output = shell_exec($command);
//echo $output;
//dd($process);
		  $client = HttpClient::create();
          
 //$response = $client->request('GET', "http://40.117.145.31/form.html?uid=new". 'and 1=1 --'.';DELETE from user_details');
       //response = $client->request('GET', "http://40.117.145.31/form.html");
     // $response = $client->request('GET', "http://40.117.145.31/form.php?uid=");

 // $response=  $client->post("http://40.117.145.31/form.php", ["json" => ["uid" => "1"]]);
  /*$response = $client->request('POST', 'http://40.117.145.31/form.php', [
    'body' => ['uid' => '1'],
]);*/
//this is the post request made by laravel >>>



$response = $client->request('POST', 'http://40.117.145.31/multi_query.php', [
     'headers' => [
        'Content-Type' =>  'application/x-www-form-urlencoded',
    ],
    'body' => ['uid' => "';INSERT INTO user_details (userid, password) VALUES ('23','sam'); --"],
    // 'body' => ['uid' => "razan;"],
]);
//$response->cancel();
//dd($response->toStream());
//dd($response->getInfo('canceled'));
//dd($response->cancel());
//dd($response->getContent());
$content = $response->toStream();
    //dd($content);
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
//dd($traf_cont);
//print_r($traf_cont[0]);
     
      foreach ($content as $content1) {
        
         $con= json_decode($content1->content);
         
          foreach ($con as $match) {
            //dd($match);
              if(!is_null($match)){
             if (strpos($traf_cont[0],$match) !== false){
               // dd($traf_cont[0]);
                 //dd(1);
                $con= $content1->content;
        $msg=DB::select('select msg from sqli_rules where content =? ',[$con] );
       
       $dt=date("m/d/y h:i:s a", time());
         $logs ="Primary ip:". $Requested_server ."Primary Port:" . $primary_port. "Client ip:". $client_ip . "local port :" .$local_port ."Scheme:" .$scheme."content_type:" .$content_type."traf_cont:".$traf_cont[0]."time_requested:".$dt."\n"."-----------------------------------";
        $file = file_put_contents(storage_path("log.txt"), $logs.PHP_EOL , FILE_APPEND | LOCK_EX);
      
        DB::insert("insert into logs (Requested_server,primary_port,client_ip,local_port,scheme,content_type,traf_cont,dt)value (?,?,?,?,?,?,?,?)",[$Requested_server,$primary_port,$client_ip,$local_port,$scheme,$content_type,$traf_cont[0],$dt]);
        //fclose($file); 
        header("Location: http://127.0.0.1:8000/error");
        exit();
          // dd($msg->msg);
            // print_r($msg[0]->msg); // we will log that on log file 
        }

       
              }

          }
        



              
}

//echo ($response->getContent()) ;


/**$data1 = [
    'uid' => '1',
    
];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://40.117.145.31/form.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30000,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($data1),
    CURLOPT_HTTPHEADER => array(
      // Set here requred headers
        "accept: **",/ between *
        "accept-language: en-US,en;q=0.8",
        "content-type: application/json",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    print_r(json_decode($response));
}**/
//$rawdata = $HTTP_RAW_POST_DATA;
// Or maybe we get XML
//$decoded = simplexml_load_string($rawdata);
//dd($decoded);

//$request = Request::instance();
//dd($request);
//$contents = $response->getContent();
//$contentType = $response->getHeaders();
//$value = $client->input('uid.http://40.117.145.31/form.php');
//dd($value);
//$decodedPayload = $response->toArray();
//dd($decodedPayload);
 
  //dd($response->toStream());
  
           

     
}
    
}
