<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
     && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    echo "Request made by AJAX technique.";
}

if (isset($_POST['check_user'])) {
  $this->view('home/check_user', array(
    "name" => $user->name,
    "user" => array(
      "username_count" => $user->getUserCount( $_POST['username'] ),
      "email_count" => $user->getUserCount( $_POST['email'] )
    )
  ));
}
