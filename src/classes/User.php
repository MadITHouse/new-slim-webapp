<?php
namespace MadSlimWeb;

use MadSlimWeb\Session;

class User{

  private $db;

  public function __construct($db){
    $this->db = $db;
    return $this->getUserData($this->db);
  }

  private function getUserData($db){
    if(Session::userIsLoggedIn()){
      Session::set('userData', $db->table('users')->where('id',Session::get('userid'))->get()[0]);
      return true;
    }else{
      return false;
    }
  }


  public function data(){
      return Session::get('userData');
  }


}

?>
