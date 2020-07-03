<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guzzleController extends Controller
{
    public function guzzle(){

       $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'http://40.117.145.31/form.php', [
        'form_params' => [
            'uid' => 'krunal',
        ]
    ]);
    $response = $response->getBody()->getContents();
    echo '<pre>';
    print_r($response);
    }

    public function store(Request $request)
    {
        $data = new GuzzlePost();
        $data->name=$request->get('name');
        $data->save();
        return response()->json('Successfully added');

    }
}
