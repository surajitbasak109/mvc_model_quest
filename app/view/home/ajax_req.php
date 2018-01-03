<?php

$user = $this->model('User');

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
     && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    if (isset($_POST['http_ref'])) {
      if ($_POST['http_ref'] == URL . 'home/check_user') {
        $user_exist = array(
          "username_count" => $user->getUserCount( $_POST['username'] ),
          "email_count" => $user->getUserCount( $_POST['email'] )
        );
        echo json_encode($user_exist);
      }
    }
    else {
      header('location: ' . URL . "home/index");
    }
}
else {
  echo(0);
}
