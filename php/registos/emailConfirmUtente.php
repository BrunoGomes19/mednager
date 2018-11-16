<?php

	if(isset($_GET["email"]) && isset($_GET["codeEmailConfirm"])){


	include "../topos/config.php";

	$email = $_GET["email"];

	$token = $_GET["codeEmailConfirm"];

	$tipo = $_GET["tipo"];

	$data = $conn->query("SELECT ccUtente from utente where emailUtente='$email' and codeEmailConfirm='$token'");

	if($data->num_rows>0){

		header("Location: registosucessoutente.php?codeEmailConfirm=$token&email=$email&tipo=$tipo");


	}else{

		header("Location: ../erros/error-403");

	}

	}else{

		header("Location: ../logins/authentication-login.php");

	}

?>
