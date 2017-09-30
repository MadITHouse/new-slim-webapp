<?php
namespace MadSlimWeb\Routes;

class home extends routeBase{

  public function index($request, $response){
    return $this->view->render($response, 'home.html');
  }

  public function profile($request, $response){
    return $this->view->render($response, 'profile.html');
  }

}

?>
