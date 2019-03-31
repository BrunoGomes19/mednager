<?php

	if(isset($_GET["email"]) && isset($_GET["codeEmailConfirm"]) && isset($_GET["tipo"])){

		@session_start();

	$email = $_GET["email"];

	$token = $_GET["codeEmailConfirm"];

	$tipo = $_GET["tipo"];





	if($tipo == "c"){

		include "../topos/config.php";

		$conn->query("UPDATE comprador set emailconfirmComprador=1 WHERE emailComprador='$email'");

		$_SESSION['msgRegisto'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <span style="color:white;">Email confirmado com sucesso!</span>
		</div>';

		header("Location: ../logins/authentication-login.php");

			exit();

	}else{

		if($tipo == "u"){


		include "../topos/config.php";

		$conn->query("UPDATE utente set emailconfirmUtente=1 WHERE emailUtente='$email'");

		$_SESSION['msgRegisto'] = '<div class="alert alert-warning alert-dismissible" data-auto-dismiss role="alert" style="background-color:#89bdf4;border-radius:8px";>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 <span style="color:white;">Email confirmado com sucesso!</span>
		</div>';

		header("Location: ../logins/authentication-login.php");

		exit();

		}


	}





	}else{

		if(!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != "")){
		header('Location: ../logins/authentication-login.php');

		exit();

	}

	}
?>
