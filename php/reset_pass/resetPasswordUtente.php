<?php

	if(isset($_GET["email"]) && isset($_GET["token"])){

	
	include "../topos/config.php";
	
	$email = $_GET["email"];
	
	$token = $_GET["token"];
	
	$tipo = $_GET["tipo"];
	
	$data = $conn->query("SELECT ccUtente from utente where emailUtente='$email' and tokenUtente='$token'");

	if($data->num_rows>0){
		
		header("Location: recuperacao.php?token=$token&email=$email&tipo=$tipo");
		
		
	}else{
		
		header("Location: ../erros/error-403");
		
	}
	
	}else{

		header("Location: ../logins/authentication-login.php");

	}

?>