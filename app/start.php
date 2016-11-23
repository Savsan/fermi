<?php

// Define ROOT of app's file system
define('INC_ROOT', dirname(__DIR__));
require INC_ROOT . "/vendor/autoload.php";

// Get config of app
include 'config.php';

// Get container
$app = new Slim\App();
$container = $app->getContainer($config);


/**
 * Load routers
 */
require 'routers.php';