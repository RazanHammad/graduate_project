<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Str;
class httpclientControllerv3 extends Controller
{	
	public function httpclient(){

		  $client = HttpClient::create();
    $response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(1);</script>', [
    'headers' => [
        'Content-Type' => 'application/json',
    ],
]);


  $content = $response->toStream();

   $uri=$response->getInfo('url');

      $traf_cont=$response->getInfo('url');
      $traf_cont=urldecode($traf_cont);
 //dd($traf_cont);
$content=DB::select('select content from web_server_roles');

      foreach ($content as $content1) {
         //dd(gettype(json_decode($content1->content)));//array
         $con= json_decode($content1->content);
        
          foreach ($con as $match) {
          //dd(gettype($match));//string
            //dd($match);

             if (strpos($traf_cont,$match) !== false){
              //dd(gettype($traf_cont));
              echo "true";
        }
          }
        



              


           

     
}


  
}
}


