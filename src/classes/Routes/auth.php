<?php
namespace MadSlimWeb\Routes;

use MadSlimWeb\Authentication;
use MadSlimWeb\Session;

class auth extends routeBase{

  public function signin($request, $response){
    if($request->isGet()){

      return $this->view->render($response, 'auth/signin.html');

    }else{

      $auth = new Authentication($this->container);
      $auth = $auth->authUser($request->getParams());

      if($auth === true){
        //redirect to page after login
        return $response->withRedirect($this->container->router->pathFor('profile'));
      }else{
        // show login page again
        $this->flash->addMessage('login_error', 'Invalid Username or password');
        return $response->withRedirect($this->container->router->pathFor('signin'));
      }

    }
  }


  public function signout($request, $response){
    Session::destroy();
    return $response->withRedirect($this->container->router->pathFor('index'));
  }

}

?>
