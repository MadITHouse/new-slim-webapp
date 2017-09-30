<?php
use MadSlimWeb\routes as Routes;
use MadSlimWeb\Middlewares\guestMiddleware;
use MadSlimWeb\Middlewares\authMiddleware;



$app->get('/', 'homeRoute:index')->setName('index');



$app->map(['GET','POST'], '/auth/signin', 'authRoute:signin')->setName('signin')->add(new guestMiddleware($container));



$app->group('', function(){
  $this->get('/profile','homeRoute:profile')->setName('profile');
  $this->get('/auth/signout', 'authRoute:signout')->setName('signout');
})->add(new authMiddleware($container));



?>
