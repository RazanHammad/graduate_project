<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Salman\Mqtt\MqttClass\Mqtt;
class mqttController extends Controller
{
   

public function SendMsgViaMqtt($topic, $message)
{
        $mqtt = new Mqtt();
        $client_id = Auth::user()->id;
        $output = $mqtt->ConnectAndPublish($topic, $message, $client_id);

        if ($output === true)
        {
            return "published";
        }
        
           return "Failed";
}
}
