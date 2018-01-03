<?php

class Controller
{
  public $db = NULL;

  public function __construct()
  {
    $this->initDBConn();
  }

  public function initDBConn()
  {
    $options = array(
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    );

    $this->db = new PDO(DB['type'] . ":host=". DB['host'] ."; dbname=". DB['dbname'] ."; charset=". DB['charset'] .";", DB['username'], DB['password']);
  }

  public function model( $model )
  {
    require_once "../app/model/$model.php";
    return new $model($this->db);
  }

  public function view( $view, $data = [], $template_option = true )
  {
    if ($template_option === true) {
      require_once "../app/view/_templates/header.php";
      require_once "../app/view/{$view}.php";
      require_once "../app/view/_templates/footer.php";
    }
    else {
      require_once "../app/view/{$view}.php";
    }
  }
}
