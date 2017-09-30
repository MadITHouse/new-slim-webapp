<?php

namespace MadSlimWeb\Routes;

class routeBase{
  protected $container, $view, $flash;
  public function __construct($container){
    $this->container = $container;
    $this->view = $container->view;
    $this->flash = $container->flash;
  }
}

?>
