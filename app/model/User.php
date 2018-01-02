<?php

class User
{
  public $name;

  public function __construct($db)
  {
    try {
      $this->db = $db;
    } catch (PDOException $e) {
      exit('There is an error with database connection.');
    }
  }

  public function getUserCount( $userProp = "" )
  {
    if ($userProp === "") {
      $s = "SELECT COUNT(id) AS count FROM users";
      $q = $this->db->prepare( $s );
      $q->execute();
    } else {
      $s = "SELECT COUNT(id) AS count FROM users WHERE username = :userProp OR email = :userProp";
      $q = $this->db->prepare( $s );
      $q->execute(array( ":userProp" => $userProp ));
    }
    return $q->fetch()['count'];
  }

  public function getAllUsers()
  {
    $s = "SELECT * FROM users";
    $q = $this->db->prepare( $s );
    $q->execute();
    return $q->fetchAll();
  }

  public function addUser($username, $email)
  {
    $s = "INSERT INTO mvc.users (username,email) VALUES (:username, :email)";
    $q = $this->db->prepare( $s );
    $params = array(
      ":username" => $username,
      ":email" => $email
    );
    $q->execute( $params );
    return $this->db->lastInsertId();
  }

}
