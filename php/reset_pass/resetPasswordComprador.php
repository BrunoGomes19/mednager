<?php

	if(isset($_GET["email"]) && isset($_GET["token"])){


	include "../topos/config.php";

	$email = $_GET["email"];

	$token = $_GET["token"];

	$tipo = $_GET["tipo"];

	$data = $conn->query("SELECT codComprador from comprador where emailComprador='$email' and tokenComprador='$token'");

	if($data->num_rows>0){

		header("Location: ../reset_pass/recuperacao.php?token=$token&email=$email&tipo=$tipo");

			exit();

	}else{

		header("Location: ../erros/error-403");

			exit();

	}

	}else{

		header("Location: ../logins/authentication-login.php");

		exit();

	}

?>
