<?php

namespace MadSlimWeb\Middlewares;

use MadSlimWeb\Session;
use MadSlimWeb\User;

class authMiddleware extends middlewareBase{

  public function __invoke($request, $response, $next){

    if(Session::userIsLoggedIn()!=true){
      $response = $response->withRedirect($this->container->router->pathFor('signin'));
    }else{
      $response = $next($request, $response);
    }
    return $response;
  }

}
