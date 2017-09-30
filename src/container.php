<?php

use MadSlimWeb\Routes;
use MadSlimWeb\Session;
use MadSlimWeb\User;

Session::init();

$container = $app->getContainer();
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};
$container['flash'] = function () {
    return new \Slim\Flash\Messages;
};

$container['user'] = function($container){
  $user = new User($container->db);  
  return $user->data();
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/resources/views', [
        'cache' => false,//__DIR__.'/../cache',
        'debug' => false
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->getEnvironment()->addGlobal('flash',$container->flash);
    $view->getEnvironment()->addGlobal('user',$container->user);

    return $view;
};
$container['homeRoute'] = function($container){
  return new Routes\home($container);
};
$container['authRoute'] = function($container){
  return new Routes\auth($container);
};
