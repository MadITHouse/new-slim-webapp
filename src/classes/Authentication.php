<?php
namespace MadSlimWeb;

use MadSlimWeb\Session;

class Authentication{

  private $db;

  public function __construct($container){
    $this->db = $container->db;
  }

  public function authUser($user){

    try {
      $x = $this->db->table('users')->where([
          [ 'username', $user['username'] ],
          [ 'password', md5($user['password']) ]
        ])
        ->orWhere([
          [ 'email', $user['email'] ],
          [ 'password', md5($user['password']) ]
        ])->get()[0];
    } catch (Exception $e) {
      $x = NULL;
    }

    if($x != NULL){
      Session::set('user_logged_in',true);
      Session::set('userid',$x->id);
      return true;
    }else{
      return fasle;
    }

  }

}

?>
