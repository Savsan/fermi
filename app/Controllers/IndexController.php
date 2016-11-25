<?php

namespace App\Controllers;

use App\Controllers\Controller;

class IndexController extends Controller{

    public function getIndex($request, $response){
        // Test response
        return $this->view->render($response, 'templates/index.twig', [
            'seoTitle' => 'Title',
            'seoDescription' => 'Description'
        ]);

    }

}