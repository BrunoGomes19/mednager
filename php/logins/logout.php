<?php

if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: authentication-login.php');
}

session_start();
if(session_destroy())
{
header("Location: authentication-login.php?signup=logout");
}

?>
