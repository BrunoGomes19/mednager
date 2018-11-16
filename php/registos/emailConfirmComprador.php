<?php

	if(isset($_GET["email"]) && isset($_GET["codeEmailConfirm"])){


	include "../topos/config.php";

	$email = $_GET["email"];

	$token = $_GET["codeEmailConfirm"];

	$tipo = $_GET["tipo"];

	$data = $conn->query("SELECT ccComprador from comprador where emailComprador='$email' and codeEmailConfirm='$token'");

	if($data->num_rows>0){

		header("Location: registosucessocomprador.php?codeEmailConfirm=$token&email=$email&tipo=$tipo");


	}else{

		header("Location: ../erros/error-403");

	}

	}else{

		header("Location: ../logins/authentication-login.php");

	}

?>
