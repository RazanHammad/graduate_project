<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Message\Request;

class httpclientControllerv5 extends Controller
{	
	public function httpclient(){
/*$client = new \GuzzleHttp\Client();
$requestbody=$client->request('GET', 'http://40.117.145.31?name=</script>alert(1);</script>')->getBody();
//$parsed = Request::parseHeader($request, 'Link');
dd($requestbody);
echo $response->getStatusCode();
echo $response->getBody();*/
$url = "http://40.117.145.31?name=</script>alert(1);</script>";

$opts = array('http' =>
    array(
        'method' => 'GET',
        'max_redirects' => '0',
        'ignore_errors' => '1'
    )
);



$context = stream_context_create($opts);
$stream = fopen($url, 'r', false, $context);
// header information as well as meta data
// about the stream
//var_dump(stream_get_meta_data($stream));

// actual data at $url
var_dump(stream_get_contents($stream));
fclose($stream);
          }
        





              


           

     
}





