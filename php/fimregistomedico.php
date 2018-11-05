<?php

	$nomecompleto = $_POST['nomecompleto'];
	
	$numeroOrdem = $_POST['numeroOrdem'];
	
	$sexo = $_POST['sexo'];
	
	$especialidade = $_POST['especialidade'];
	
	$date = $_POST['date'];
	
	$contacto1 = $_POST['contacto1'];
	
	$contacto2 = $_POST['contacto2'];
	
	$cc = $_POST['cc'];
	
	$nif = $_POST['nif'];
	
	$nib = $_POST['nib'];
	
	$morada = $_POST['morada'];
	
	$cidade = $_POST['cidade'];
	
	$codigopostal = $_POST['codigopostal'];
	
	$sobremim = $_POST['sobremim'];
	
	$foto = $_POST['foto'];
	
	echo $nomecompleto;
	
	

	$conn->query("UPDATE comprador set tokenComprador='$str' WHERE emailComprador='$email'");

?>