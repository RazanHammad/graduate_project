<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpClient\HttpClient;
class httpclientController extends Controller
{	
	public function httpclient(){

		  $client = HttpClient::create();
   // $response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(1);</script>');
  
$response = $client->request('GET', 'http://40.117.145.31?name=<script>alert(1);</script>', [
    'headers' => [
        'content_type' => 'text/html',
    ],
]);
  //$u= is_numeric($url);
   //dd($u);
//$httpInfo = $response->getInfo();
    //$statusCode = $response->getStatusCode();
    $url = $response->getHeaders()['content-type'][0];
   //$content2 = $response->toArray();
   $content = $response->getContent();
   $url = $response->getInfo('url');
$httpLogs = $response->getInfo();
   $content1 = $response->toStream();
    dd($url);
	}
  

}
