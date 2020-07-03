<?php
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use App\Library\Services\DemoOne;
  
class TestController extends Controller
{
    public function index(DemoOne $customServiceInstance)
    {
        echo $customServiceInstance->doSomethingUseful();
    }
}