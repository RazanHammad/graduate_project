<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Str;
class httpclientControllerv4 extends Controller
{	
	public function httpclient(){

		  $client = HttpClient::create();
   /* $response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(1);</script>', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
]);*/

  $response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(document.cookie)</script>');
//dd($response->toStream());//gets all data with request and and

  $content = $response->toStream();

   //dd($content);
      $uri=$response->getInfo('url');
      $Requested_server=$response->getInfo('primary_ip');
      $client_ip=$response->getInfo('local_ip');
      $local_port=$response->getInfo('local_port');
      $primary_port=$response->getInfo('primary_port');
      $scheme=$response->getInfo('scheme');
      $content_type=$response->getInfo('content_type');
      //dd($Requested_server,$client_ip,$uri,$local_port,$primary_port,$scheme,$content_type);

     // $traf_cont=urldecode($traf_cont);
 
$content=DB::select('select content from web_server_roles');
//dd($content);
      foreach ($content as $content1) {
         //dd(gettype(json_decode($content1->content)));//array
         $con= json_decode($content1->content);
        
          foreach ($con as $match) {
          //dd(gettype($match));//string
            //dd($match);
              if(!is_null($match)){
             if (strpos($uri,$match) !== false){

              //dd($match);
              //dd(gettype($traf_cont));
             // echo "true";
             // $msg=DB::select('select msg from web_server_roles where content = '.$match );
              // $msg= DB::select('select * from web_server_roles where content =? ',[$match]);
                $con= $content1->content;
        $msg= DB::select('select msg from web_server_roles where content =? ',[$con]);
             // print_r($msg->msg[0]);
             print_r($msg[0]->msg);
        }
              }

          }
        



              


           

     
}


  
}
}


