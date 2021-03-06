<?php

$url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
$controller = isset($url[0]) ? $url[0] : 'home';
$method = isset($url[1]) ? $url[1] : 'index';
unset($url[0], $url[1]);
$params = isset($url) ? array_values($url) : [];

$params_output = "";
if ( count($params) > 0 ) {
  $params_output .= " (";
    foreach ($params as $key => $value) {
      if ( $key < 1 ) {
        $params_output .= $value;
      }
      else {
        $params_output .= " &raquo; ";
        $params_output .= $value;
      }
  }
  $params_output .= ")";
}

function isCurrent($method, $subjArr)
{
    foreach ($subjArr as $subj) {
        if ($subj === $method) {
            $current = 'current';
            return $current;
        } else {
            $current = 'not-current';
        }
    }
    return $current;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $data['name']; ?></title>
  <link rel="stylesheet" href="<?php echo URL . 'css/style.css' ?>">
  <script src="<?php echo URL . 'js/jquery-3.2.1.min.js' ?>"></script>
</head>
<body>
  <div id="wrap">

  <header id="top" class="site-header">
    <h1 class="page-title"><?php echo ucfirst($controller) . ' &raquo; ' . ucfirst($method) . $params_output; ?></h1>
  </header>

  <nav id="nav" class="site-navigation">
    <ul class="nav-group">
      <li class="<?php echo isCurrent($method, ["index"]); ?>">
        <a href="<?php echo URL . 'home/index' ?>">Home</a>
      </li>
      <li class="<?php echo isCurrent($method, ["list_all_users"]); ?>">
        <a href="<?php echo URL . 'home/list_all_users' ?>">Users</a>
      </li>
      <li class="<?php echo isCurrent($method, ["add_user"]); ?>">
        <a href="<?php echo URL . 'home/add_user' ?>">Add User</a>
      </li>
      <li class="<?php echo isCurrent($method, ["check_user"]); ?>">
        <a href="<?php echo URL . 'home/check_user' ?>">Check User</a>
      </li>
    </ul>
  </nav>
