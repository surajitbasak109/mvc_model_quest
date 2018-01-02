<?php

/**
 *
 */
class Home extends Controller
{
  public function index( $name = "" )
  {
    $user = $this->model('User');
    $user->name = $name;

    $this->view('home/index', array(
      "name" => $user->name,
      "user" => array(
        "count" => $user->getUserCount()
    )));
  }

  public function list_all_users( $name = "" )
  {
    $user = $this->model('User');
    $user->name = $name;

    $this->view('home/list_all_users', array(
      "name" => $user->name,
      "user" => array(
        "count" => $user->getUserCount(),
        "data" => $user->getAllUsers()
    )));
  }

  public function add_user( $name = "" )
  {
    $user = $this->model('User');
    $user->name = $name;

    $this->view('home/add_user', array(
      "name" => $user->name,
    ));
  }

  public function addUser() {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if ( isset( $_POST['add_user'] ) ) {
      $user = $this->model('User');
      if ( ! empty( $_POST['username'] ) && ! empty( $_POST['email'] ) ) {
        $is_user_exist = $user->getUserCount($_POST['username']);
        if ($is_user_exist > 0) {
          header('location: ' . URL . 'home/add_user/user_exist');
        }
        $is_email_exist = $user->getUserCount($_POST['email']);
        if ($is_email_exist > 0) {
          header('location: ' . URL . 'home/add_user/email_exist');
        }
        $user->addUser($_POST['username'], $_POST['email']);
        header('location: ' . URL . 'home/list_all_users');
      } else {
        header('location: ' . URL . 'home/add_user');
      }
    }
  }
}
