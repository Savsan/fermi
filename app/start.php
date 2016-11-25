<?php
ini_set('display_errors', 'On');

// Define ROOT of app's file system
define('INC_ROOT', dirname(__DIR__));
require INC_ROOT . "/vendor/autoload.php";

// Get config of app
include 'config.php';

// Get container
$app = new Slim\App($config);
$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(INC_ROOT . "/resources/views", [
        // default -'path/to/cache'
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    
    // Add globals
    // DateTime
    $view->getEnvironment()->addGlobal('current', [
        'year' => date("Y"),
    ]);
    return $view;
};

/**
 * Controllers registration
 */

$container['IndexController'] = function ($container) {
    return new \App\Controllers\IndexController($container);
};

/**
 * Load routers
 */
require 'routers.php';