<?php

namespace MadSlimWeb\Middlewares;

class middlewareBase{
  protected $container;
  public function __construct($container){
    $this->container = $container;
  }
}

?>
