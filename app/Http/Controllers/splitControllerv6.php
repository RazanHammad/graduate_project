<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class splitControllerv6 extends Controller
{
    public function split(){
$string='alert tcp $EXTERNAL_NET any -> $HTTP_SERVERS $HTTP_PORTS (msg:"ET WEB_SERVER Suspicious Chmod Usage in URI (Inbound)"; flow:to_server,established; content:"chmod"; fast_pattern:only; nocase; http_uri; pcre:"/chmod(?:\+|\x2520|\x24IFS|\x252B|\s)+(?:x|[0-9]{3,4})/Ui"; content:!"&launchmode="; http_uri; content:!"/chmod/"; http_uri; content:!"searchmod"; http_uri; metadata: former_category HUNTING; reference:url,doc.emergingthreats.net/2009363; classtype:attempted-admin; sid:2009363; rev:8; metadata:affected_product Linux, attack_target Client_Endpoint, deployment Perimeter, signature_severity Minor, created_at 2010_07_30, updated_at 2019_12_31;)';

$token = strpos($string, "(");
$token=substr($string,$token+1,-1);
$token = strtok($token, ";");
$myArray=array();
while ($token !== false)
{
    array_push($myArray,$token);
    $token = strtok(";");
}
$content=array();
foreach ($myArray as $item){
    if (strpos($item, ':') !== false) {
        $i=strpos($item,':');
        $value=substr($item,$i+1);
        $key=substr($item,0,$i);
        if (isset($content[$key])){
            if (is_array($content[$key])){
                array_push($content[$key],$value);
            }else{
                $init=$content[$key];
                $content[$key]=array();
                array_push($content[$key],$init,$value);
            }
        }else{
            $content[$key]=$value;
        }
    }
}
print_r(($content));}}