<?php

if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: ../html/ltr/authentication-login.php');
}

session_start();
if(session_destroy())
{
header("Location: ../html/ltr/authentication-login.php?signup=logout");
}

?>
