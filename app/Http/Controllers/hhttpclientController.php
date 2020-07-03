<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Str;
class hhttpclientController extends Controller
{	
	public function httpclient(){

		  $client = HttpClient::create();
    $response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(1);</script>', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
]);

  //$u= is_numeric($url);
   //dd($u);
   // $statusCode = $response->getStatusCode();
  //  $contentType = $response->getHeaders()['content-type'][0];
 //$content = $response->getContent();
  $content = $response->toStream();

   // dd($content);
  //  $uri=$response->getInfo('url');
    //if(strpos($uri, "%3Cscript%3E") !== false){
     // dd("XSS attempt");
    //}else {
      //dd("error");
    //}
      $traf_cont=$response->getInfo('url');
      $traf_cont=urldecode($traf_cont);
     // dd($traf_cont);
$content=DB::select('select content from web_server_roles');

//$content = array();
//dd($content[0]->content) ;
  //$cont=$rules->content;

//$find=$content[0];
//var_dump($content[0]);

 //print_r($content[0]);
//dd($content);


      foreach ($content as $content1) {
        //$content1=json_decode($content1);
dd($content1->content);
      //dd(strpos($traf_cont,$content1->content) !== false);
        if(!empty($content1->content)){
           if (strpos($traf_cont,$content1->content) !== false){
        //dd($content1->content);
            $con= $content1->content;
            
        $msg= DB::select('select msg from web_server_roles where content =? ',[$con]);
        echo($msg[0]->msg);
        }
     
}


  
}
}
}

