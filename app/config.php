<?php

/**
* Error reporting for development purpose
* @TODO implement it with if(DEV === 'dev') logic
**/
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
* define Site  URL
* Very useful for linking your stylesheet
* to the templaes or linking page (or post)
**/
define('URL', '/mvc/pub/');

/**
* define Database Credentials
* The core functionality for the data
* Without data your site is like static site
* This is dynamic technology sir!
**/
define('DB', array(
  "type"      => 'mysql',
  'host'      => 'localhost',
  'dbname'    => 'mvc',
  'username'  => 'root',
  'password'  => 'p@$$w0rd',
  'charset'   =>  'utf8'
));

/**
* Include mandatory core files
* #application and #controller
* return the instance of App object to the $app variable
**/
require_once "../app/core/application.php";
require_once "../app/core/controller.php";
$app = new App;
