<?php

namespace MadSlimWeb\Middlewares;

use MadSlimWeb\Session;

class guestMiddleware extends middlewareBase{

  public function __invoke($request, $response, $next){

    if(Session::userIsLoggedIn()!=true){
      $response = $next($request, $response);
    }else{
      $response = $response->withRedirect($this->container->router->pathFor('index'));
    }
    return $response;
  }

}
