<?php
session_start();
include_once "config.php";
$conn->set_charset("utf8");

if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
  header('Location: ../html/ltr/authentication-login.php');
}


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
