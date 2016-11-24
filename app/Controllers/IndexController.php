<?php

namespace App\Controllers;

use App\Controllers\Controller;

class IndexController extends Controller{

    public function getIndex($request, $response){
        // Test response
        $response->write("<h1>Hello ! It works !!!</h1>");
        return $response;

    }

}