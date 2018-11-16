<?php

	if(isset($_GET["email"]) && isset($_GET["codeEmailConfirm"]) && isset($_GET["tipo"])){

	$email = $_GET["email"];

	$token = $_GET["codeEmailConfirm"];

	$tipo = $_GET["tipo"];





	if($tipo == "c"){

		include "../topos/config.php";

		$conn->query("UPDATE comprador set emailconfirmComprador=1 WHERE emailComprador='$email'");

		header("Location: ../logins/authentication-login.php?signup=emailconfirmado");


	}else{

		if($tipo == "u"){


		include "../topos/config.php";

		$conn->query("UPDATE utente set emailconfirmUtente=1 WHERE emailUtente='$email'");

		header("Location: ../logins/authentication-login.php?signup=emailconfirmado");


		}


	}





	}else{

		echo "ERRO!";

	}
?>
