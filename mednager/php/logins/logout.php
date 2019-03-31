<?php

@session_start();

if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
	header('Location: authentication-login.php');

	exit();

}


if(session_destroy())
{

@session_start();

$_SESSION['msgLogout'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <span style="color:white;">Você saiu da sua conta. Esperemos que volte brevemente!</span>
</div>';

header("Location: authentication-login.php");

exit();

}

?>
